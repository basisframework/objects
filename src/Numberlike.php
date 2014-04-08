<?php
namespace Basis\Objects;

interface Numberlike {

	public function toString();

	public function toBase($base = 10);

	public function add($other);

	public function subtract($other);

	
}