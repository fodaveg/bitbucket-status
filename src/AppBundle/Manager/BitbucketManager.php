<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Repo;

/**
 * @author David Velasco <dvelasco@wearemarketing.com>
 */
class BitbucketManager
{
    private $bbUser;
    private $bbPass;
    private $bbAccount;
    private $em;

    /**
     * BitbucketManager constructor.
     */
    public function __construct($em, $bbUser, $bbPass, $bbAccount)
    {
        $this->em = $em;
        $this->bbUser = $bbUser;
        $this->bbPass = $bbPass;
        $this->bbAccount = $bbAccount;
    }

    public function authenticate()
    {
        $user = new \Bitbucket\API\User();
        $user->getClient()->addListener(
            new \Bitbucket\API\Http\Listener\BasicAuthListener($this->bbUser, $this->bbPass)
        );
    }

    public function getRepositoriesFromBitbucket($persist = false)
    {
        $repositories = new \Bitbucket\API\Repositories();
        $repositories->setCredentials(new \Bitbucket\API\Authentication\Basic($this->bbUser, $this->bbPass));
        $repoRepository = $this->em->getRepository(Repo::class);

        $jsonRepos = json_decode($repositories->all($this->bbAccount)->getContent());

        if ($persist == true) {
            foreach ($jsonRepos->values as $repo) {

                $persistedRepo = $repoRepository->findOneByName($repo->full_name);

                if (null === $persistedRepo) {
                    $newRepo = new Repo();
                    $newRepo->setName($repo->full_name);
                    $this->em->persist($newRepo);
                    $this->em->flush();
                }
            }
        }

        return $repoRepository->findAll();
    }
}
