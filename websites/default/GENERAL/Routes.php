<?php
namespace GENERAL;
interface Routes {
	public function getRoutes(): array;
	// public function getAuth(): Authentication;
	// public function checkLogin();
	public function getVarsForLayout($title, $output): array;
}
