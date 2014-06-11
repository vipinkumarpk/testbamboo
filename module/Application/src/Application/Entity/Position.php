<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

/**
 * Position
 *
 * @ORM\Table(name="positions")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Position implements InputFilterAwareInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


     /**
     * @ORM\ManyToOne(targetEntity="Profile")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    private $profile;

    /**
     * @var string
     *
     * @ORM\Column(name="externalid", type="string", length=128, nullable=true)
     */
    private $externalid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=128, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="companyname", type="string", length=128, nullable=true)
     */
    private $companyname;

    /**
     * @var string
     *
     * @ORM\Column(name="companysize", type="string", length=64, nullable=true)
     */
    private $companysize;

    /**
     * @var string
     *
     * @ORM\Column(name="companytype", type="string", length=128, nullable=true)
     */
    private $companytype;

    /**
     * @var string
     *
     * @ORM\Column(name="industry", type="string", length=128, nullable=true)
     */
    private $industry;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=128, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=128, nullable=true)
     */
    private $country;


    /**
     * @var datetime $startdate
     *
     * @ORM\Column(name="startdate", type="datetime", nullable=true)
     */
    private $startdate;


    /**
     * @var datetime $enddate
     *
     * @ORM\Column(name="enddate", type="datetime", nullable=true)
     */
    private $enddate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="current", type="boolean", nullable=true)
     */
    private $current;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var datetime $modified
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;


    protected $inputFilter;

    /**
     * @return the $id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return the $profile
     */
    public function getProfile() {
        return $this->profile;
    }

    /**
     * @return the $externalid
     */
    public function getExternalid() {
        return $this->externalid;
    }

    /**
     * @return the $title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @return the $summary
     */
    public function getSummary() {
        return $this->summary;
    }

    /**
     * @return the $companyname
     */
    public function getCompanyname() {
        return $this->companyname;
    }

    /**
     * @return the $companysize
     */
    public function getCompanysize() {
        return $this->companysize;
    }

    /**
     * @return the $companytype
     */
    public function getCompanytype() {
        return $this->companytype;
    }

    /**
     * @return the $industry
     */
    public function getIndustry() {
        return $this->industry;
    }

    /**
     * @return the $city
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @return the $country
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * @return the $startdate
     */
    public function getStartdate() {
        return $this->startdate;
    }

    /**
     * @return the $enddate
     */
    public function getEnddate() {
        return $this->enddate;
    }

    /**
     * @return the $current
     */
    public function getCurrent() {
        return $this->current;
    }

    /**
     * @return the $created
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @return the $modified
     */
    public function getModified() {
        return $this->modified;
    }


//Setters

    /**
     * @param number $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @param field_type $profile
     */
    public function setProfile($profile) {
        $this->profile = $profile;
    }

    /**
     * @param string $externalid
     */
    public function setExternalid($externalid) {
        $this->externalid = $externalid;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary) {
        $this->summary = $summary;
    }

    /**
     * @param string $companyname
     */
    public function setCompanyname($companyname) {
        $this->companyname = $companyname;
    }

    /**
     * @param string $companysize
     */
    public function setCompanysize($companysize) {
        $this->companysize = $companysize;
    }

    /**
     * @param string $industry
     */
    public function setIndustry($industry) {
        $this->industry = $industry;
    }

    /**
     * @param string $city
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * @param field_type $country
     */
    public function setCountry($country) {
        $this->country = $country;
    }

    /**
     * @param string $startdate
     */
    public function setStartdate($startdate) {
        $this->startdate = $startdate;
    }

    /**
     * @param string $enddate
     */
    public function setEnddate($enddate) {
        $this->enddate = $enddate;
    }

    /**
     * @param string $current
     */
    public function setCurrent($current) {
        $this->current = $current;
    }

    /**
     * @param \Application\Entity\datetime $created
     */
    public function setCreated($created) {
        $this->created = $created;
    }

    /**
     * @param \Application\Entity\datetime $modified
     */
    public function setModified($modified) {
        $this->modified = $modified;
    }





    /**
    * Exchange array - used in ZF2 form
    *
    * @param array $data An array of data
    */
    public function exchangeArray($data)
    {
        $this->id = (isset($data['id']))? $data['id'] : null;
        $this->profile = (isset($data['profile']))? $data['profile'] : null;
        $this->externalid = (isset($data['externalid']))? $data['externalid'] : null;
        $this->title = (isset($data['title']))? $data['title'] : null;
        $this->summary = (isset($data['summary']))? $data['summary'] : null;
        $this->companyname = (isset($data['companyname']))? $data['companyname'] : null;
        $this->companysize = (isset($data['companysize']))? $data['companysize'] : null;
        $this->companytype = (isset($data['companytype']))? $data['companytype'] : null;
        $this->industry = (isset($data['industry']))? $data['industry'] : null;
        $this->city = (isset($data['city']))? $data['city'] : null;
        $this->country = (isset($data['country']))? $data['country'] : null;
        $this->startdate = (isset($data['startdate']))? $data['startdate'] : null;
        $this->enddate = (isset($data['enddate']))? $data['enddate'] : null;
        $this->current = (isset($data['current']))? $data['current'] : null;
        $this->created = (isset($data['created']))? $data['created'] : null;
        $this->modified = (isset($data['modified']))? $data['modified'] : null;
    }

    /**
    * Get an array copy of object
    *
    * @return array
    */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
    * Set input method
    *
    * @param InputFilterInterface $inputFilter
    */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    /**
    * Get input filter
    *
    * @return InputFilterInterface
    */
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));


            $inputFilter->add($factory->createInput(array(
                'name'     => 'profile',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'externalid',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'title',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'summary',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'companyname',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'companysize',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'companytype',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'industry',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'city',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'country',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'startdate',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'enddate',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'current',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'created',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'modified',
                'required' => false,
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}
