<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

use FMCUser;

/**
 * Profile
 *
 * @ORM\Table(name="profiles")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Profile implements InputFilterAwareInterface
{
/**
 * @ORM\Column(type="guid")
 * @ORM\Id
 * @ORM\GeneratedValue(strategy="UUID")
 */
private $id;


     /**
     * @ORM\ManyToOne(targetEntity="FMCUser\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=128, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="middlename", type="string", length=128, nullable=true)
     */
    private $middlename;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=128, nullable=true)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="address1", type="string", length=64, nullable=true)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address2", type="string", length=64, nullable=true)
     */
    private $address2;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=128, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=128, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=64, nullable=true)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=64, nullable=true)
     */
    private $country;    

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=64, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=64, nullable=true)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="workEmail", type="string", length=128, nullable=true)
     */
    private $workemail;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinurl", type="string", length=128, nullable=true)
     */
    private $linkedinurl;

    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="text", nullable=true)
     */
    private $profile;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

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
     * @return the $user
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * @return the $firstname
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @return the $middlename
     */
    public function getMiddlename() {
        return $this->middlename;
    }

    /**
     * @return the $lastname
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * @return the $address1
     */
    public function getAddress1() {
        return $this->address1;
    }

    /**
     * @return the $address2
     */
    public function getAddress2() {
        return $this->address2;
    }

    /**
     * @return the $city
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * @return the $state
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @return the $zip
     */
    public function getZip() {
        return $this->zip;
    }

    /**
     * @return the $country
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * @return the $phone
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * @return the $mobile
     */
    public function getMobile() {
        return $this->mobile;
    }

    /**
     * @return the $email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return the $workemail
     */
    public function getWorkemail() {
        return $this->workemail;
    }

    /**
     * @return the $linkedinurl
     */
    public function getLinkedinurl() {
        return $this->linkedinurl;
    }

    /**
     * @return the $profile
     */
    public function getProfile() {
        return $this->profile;
    }

    /**
     * @return the $notes
     */
    public function getNotes() {
        return $this->notes;
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
     * @param field_type $user
     */
    public function setUser(FMCUser\Entity\User $user) {
        $this->user = $user;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    /**
     * @param string $middlename
     */
    public function setMiddlename($middlename) {
        $this->middlename = $middlename;
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    /**
     * @param string $address1
     */
    public function setAddress1($address1) {
        $this->address1 = $address1;
    }

    /**
     * @param string $address2
     */
    public function setAddress2($address2) {
        $this->address2 = $address2;
    }

    /**
     * @param string $city
     */
    public function setCity($city) {
        $this->city = $city;
    }

    /**
     * @param string $state
     */
    public function setState($state) {
        $this->state = $state;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip) {
        $this->zip = $zip;
    }

    /**
     * @param field_type $country
     */
    public function setCountry($country) {
        $this->country = $country;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * @param string $mobile
     */
    public function setMobile($mobile) {
        $this->mobile = $mobile;
    }

    /**
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @param string $workemail
     */
    public function setWorkemail($workemail) {
        $this->workemail = $workemail;
    }

    /**
     * @param string $linkedinurl
     */
    public function setLinkedinurl($linkedinurl) {
        $this->linkedinurl = $linkedinurl;
    }

    /**
     * @param string $profile
     */
    public function setProfile($profile) {
        $this->profile = $profile;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes) {
        $this->notes = $notes;
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
        $this->user = (isset($data['user']))? $data['user'] : null;
        $this->firstname = (isset($data['firstname']))? $data['firstname'] : null;
        $this->middlename = (isset($data['middlename']))? $data['middlename'] : null;
        $this->lastname = (isset($data['lastname']))? $data['lastname'] : null;
        $this->address1 = (isset($data['address1']))? $data['address1'] : null;
        $this->address2 = (isset($data['address2']))? $data['address2'] : null;
        $this->state = (isset($data['state']))? $data['state'] : null;
        $this->zip = (isset($data['zip']))? $data['zip'] : null;
        $this->country = (isset($data['country']))? $data['country'] : null;
        $this->phone = (isset($data['phone']))? $data['phone'] : null;
        $this->mobile = (isset($data['mobile']))? $data['mobile'] : null;
        $this->email = (isset($data['email']))? $data['email'] : null;
        $this->workemail = (isset($data['workemail']))? $data['workemail'] : null;
        $this->linkedinurl = (isset($data['linkedinurl']))? $data['linkedinurl'] : null;
        $this->profile = (isset($data['profile']))? $data['profile'] : null;
        $this->notes = (isset($data['notes']))? $data['notes'] : null;
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
                'required' => false,
               /* 'filters'  => array(
                    array('name' => 'Int'),
                ),*/

            )));


            $inputFilter->add($factory->createInput(array(
                'name'     => 'middlename',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'address1',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'address2',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'state',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'zip',
                'required' => false,
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'firstname',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 255,
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'lastname',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}
