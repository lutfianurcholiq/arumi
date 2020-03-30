<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array('database');

$autoload['libraries'] = array('database', 'Template', 'form_validation', 'session', 'bo', 'upload');

$autoload['drivers'] = array();

$autoload['helper'] = array('html', 'url', 'file', 'text', 'form','my');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('modelKu', 'hewanModel', 'pelangganModel');