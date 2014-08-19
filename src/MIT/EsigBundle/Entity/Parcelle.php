<?php

namespace MIT\EsigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Parcelle
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Parcelle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numMarche", type="string", length=255)
     */
    private $numMarche;

    /**
     * @var string
     *
     * @ORM\Column(name="numParcelle", type="string", length=255)
     */
    private $numParcelle;

    /**
     * @var string
     *
     * @ORM\Column(name="proprietaire", type="string", length=255)
     */
    private $proprietaire;

    /**
     * @var float
     *
     * @ORM\Column(name="superficie", type="float")
     */
    private $superficie;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    private $file;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numMarche
     *
     * @param string $numMarche
     * @return Parcelle
     */
    public function setNumMarche($numMarche)
    {
        $this->numMarche = $numMarche;
    
        return $this;
    }

    /**
     * Get numMarche
     *
     * @return string 
     */
    public function getNumMarche()
    {
        return $this->numMarche;
    }

    /**
     * Set numParcelle
     *
     * @param string $numParcelle
     * @return Parcelle
     */
    public function setNumParcelle($numParcelle)
    {
        $this->numParcelle = $numParcelle;
    
        return $this;
    }

    /**
     * Get numParcelle
     *
     * @return string 
     */
    public function getNumParcelle()
    {
        return $this->numParcelle;
    }

    /**
     * Set proprietaire
     *
     * @param string $proprietaire
     * @return Parcelle
     */
    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;
    
        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return string 
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Set superficie
     *
     * @param float $superficie
     * @return Parcelle
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;
    
        return $this;
    }

    /**
     * Get superficie
     *
     * @return float 
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Parcelle
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    public function getFile()
    {
        return $this->file;
    }
    
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }
    
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) { return; }
        $this->image = $this->file->guessExtension();
    }
    
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) { return; }

        $this->file->move( $this->getUploadRootDir(), $this->id.'.'.$this->image );
    }
    
    /**
    * @ORM\PreRemove()
    */
    public function preRemoveUpload()
    {
        $tempFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->image;;
        if (file_exists($tempFile)) {
                unlink($tempFile);
        }
    }

    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'najdah/img/Etablissements';
    }
    
    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    
    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getImage();
    }

    
}
