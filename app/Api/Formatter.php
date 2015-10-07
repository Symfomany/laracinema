<?php


namespace App\Api;

/**
 * Class Formatter
 * Format datas
 * @package App\Api
 */
class Formatter{

    /**
     * Datas
     * @var
     */
    protected $datas;

    /**
     * Format
     * @var
     */
    protected $format;


    public function __construct(){}


    /**
     * Format datas to 3D graph with columns by month
     * [2, 3, null, 4, 0, 5, 1, 4, 6, 3]
     * @param array $datas
     */
    public function getColumnsThreeDimensions($datas = array()){
        if(empty($datas) || !is_array($datas)){
            throw new \ErrorException('Aucune données de données ou valide!');
        }

        foreach($datas as $data){
            if( !isset($data['nb'])){
                throw new \ErrorException('Le données doivent le nb');
            }

            $this->datas[] = (int)$data['nb'];
        }


        return $this->datas;

    }

    /**
     * Format datas to Pi Chart
     * data: [
        ['Firefox',   45.0],
        ['IE',       26.8],
        {
        name: 'Chrome',
        y: 12.8,
        sliced: true,
        selected: true
        },
        ['Safari',    8.5],
        ['Opera',     6.2],
        ['Others',   0.7]
     * ]
     * @param array $datas
     */
    public function getPieChartsFormat($datas = array()){

        if(empty($datas) || !is_array($datas)){
            throw new \ErrorException('Aucune données de données ou valide!');
        }


        foreach($datas as $data){
            if(!isset($data['title']) || !isset($data['nb'])){
                throw new \ErrorException('Le données doivent comporter title ou nb');
            }

            $this->datas[] = [$data['title'], (int)$data['nb']];
        }


        return $this->datas;
    }

    /**
     * @return mixed
     */
    public function getDatas()
    {
        return $this->datas;
    }

    /**
     * @param mixed $datas
     */
    public function setDatas($datas)
    {
        $this->datas = $datas;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }








}