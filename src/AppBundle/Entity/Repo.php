<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_repo")
 *
 * @author David Velasco <dvelasco@wearemarketing.com>
 */
class Repo
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    protected $serverProdStatus = 1;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    protected $serverStagingStatus = 1;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    protected $serverReleaseStatus = 1;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    protected $branchMasterStatus = 1;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    protected $branchDevelopStatus = 1;

    /**
     * @ORM\Column(type="boolean", options={"default":1})
     */
    protected $branchReleaseStatus = 1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $blockDescription;

    /**
     * Getter for id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getter for name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter for name.
     *
     * @return Repo
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Getter for serverProdStatus.
     *
     * @return mixed
     */
    public function getServerProdStatus()
    {
        return $this->serverProdStatus;
    }

    /**
     * Setter for serverProdStatus.
     *
     * @return Repo
     */
    public function setServerProdStatus($serverProdStatus)
    {
        $this->serverProdStatus = $serverProdStatus;

        return $this;
    }

    /**
     * Getter for serverStagingStatus.
     *
     * @return mixed
     */
    public function getServerStagingStatus()
    {
        return $this->serverStagingStatus;
    }

    /**
     * Setter for serverStagingStatus.
     *
     * @return Repo
     */
    public function setServerStagingStatus($serverStagingStatus)
    {
        $this->serverStagingStatus = $serverStagingStatus;

        return $this;
    }

    /**
     * Getter for serverReleaseStatus.
     *
     * @return mixed
     */
    public function getServerReleaseStatus()
    {
        return $this->serverReleaseStatus;
    }

    /**
     * Setter for serverReleaseStatus.
     *
     * @return Repo
     */
    public function setServerReleaseStatus($serverReleaseStatus)
    {
        $this->serverReleaseStatus = $serverReleaseStatus;

        return $this;
    }

    /**
     * Getter for branchMasterStatus.
     *
     * @return mixed
     */
    public function getBranchMasterStatus()
    {
        return $this->branchMasterStatus;
    }

    /**
     * Setter for branchMasterStatus.
     *
     * @return Repo
     */
    public function setBranchMasterStatus($branchMasterStatus)
    {
        $this->branchMasterStatus = $branchMasterStatus;

        return $this;
    }

    /**
     * Getter for branchDevelopStatus.
     *
     * @return mixed
     */
    public function getBranchDevelopStatus()
    {
        return $this->branchDevelopStatus;
    }

    /**
     * Setter for branchDevelopStatus.
     *
     * @return Repo
     */
    public function setBranchDevelopStatus($branchDevelopStatus)
    {
        $this->branchDevelopStatus = $branchDevelopStatus;

        return $this;
    }

    /**
     * Getter for branchReleaseStatus.
     *
     * @return mixed
     */
    public function getBranchReleaseStatus()
    {
        return $this->branchReleaseStatus;
    }

    /**
     * Setter for branchReleaseStatus.
     *
     * @return Repo
     */
    public function setBranchReleaseStatus($branchReleaseStatus)
    {
        $this->branchReleaseStatus = $branchReleaseStatus;

        return $this;
    }

    /**
     * Getter for blockDescription.
     *
     * @return mixed
     */
    public function getBlockDescription()
    {
        return $this->blockDescription;
    }

    /**
     * Setter for blockDescription.
     *
     * @return Repo
     */
    public function setBlockDescription($blockDescription)
    {
        $this->blockDescription = $blockDescription;

        return $this;
    }
}
