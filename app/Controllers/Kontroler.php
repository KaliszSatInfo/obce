<?php

namespace App\Controllers;
use App\Models\Kraj;
use App\Models\Okres;
use App\Models\Obec;

class Kontroler extends BaseController   
{
    var $kraj;
    var $okres;
    var $obec;
    var $data;

    public function __construct()
    {
        $this->kraj = new Kraj();
        $this->okres = new Okres();
        $this->obec = new Obec();

        $kraj = 141;
        $this->data['okres'] = $this->okres->select('okres.nazev, okres.kod')->join('kraj', 'kraj.kod = okres.kraj', 'inner')->where('kraj', $kraj)->findAll();
    }

    public function load(){
        return view('NavbarOkresy', $this->data);
    }

    public function loadObecInfo($okres){

        $perPage = $this->request->getVar('per_page') ?? 20;

        $this->data['obec'] = $this->obec->select('obec.nazev, count(*) as pocetMist')
            ->where('okres', $okres)
            ->join('cast_obce', 'cast_obce.obec = obec.kod', 'inner')
            ->join('ulice', 'ulice.cast_obce = cast_obce.kod', 'inner')
            ->join('adresni_misto', 'adresni_misto.ulice = ulice.kod', 'inner')
            ->groupBy('obec.kod')
            ->orderBy('pocetMist', 'desc')
            ->paginate($perPage);
        
        $this->data['pager'] = $this->obec->pager;
        $this->data['per_page'] = $perPage;
        
        return view('obecView', $this->data);
    }
}
