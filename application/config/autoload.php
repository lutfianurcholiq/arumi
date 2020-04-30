<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array('database');

$autoload['libraries'] = array('database', 'Template', 'form_validation', 'session', 'libs', 'upload');

$autoload['drivers'] = array();

$autoload['helper'] = array('html', 'url', 'file', 'text', 'form', 'my');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('modelKu', 'pelangganModel', 'coaModel', 'bahanModel', 'karyawanModel', 'produkModel', 'biayaModel', 'komunitasModel',
                            'pemesananModel', 'listPesananModel', 'pesananModel', 'bomModel', 'produksiModel', 'addOperasionalModel', 'listOperasionalModel',                
                            'jurnalModel'
                        );