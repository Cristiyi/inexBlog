<?php
/* This script should be ran in cron
* Script indexes all the blogs in subdirectories, finds the needed blog data and writes it to blog_data.json file
* Author: Juraj Nyiri / jnyiri@sk.ibm.com
*/

//Todo: implement blacklist for private blogs

//declarations
$foundBlogs = array();
$indexFileDirLocation = realpath(dirname(__FILE__));
$blockedBlogs = json_decode(file_get_contents($indexFileDirLocation . "/blog_blockedDomains.json"));

//gets all directories next to indexBlogs.php file
foreach(glob($indexFileDirLocation."/*", GLOB_ONLYDIR) as $dir) 
{
	//check whether the blog is not private
	if(!in_array(basename($dir),$blockedBlogs))
	{
		//check for theme data file existing, with priority: Custom, Dev, Main
		$data = new stdClass();
		$data->dir = basename($dir);
		if(file_exists($dir."/wp-content/themes/ibmNorthstarThemeCustom/api/data.json"))
		{
			$data->data = json_decode(file_get_contents($dir."/wp-content/themes/ibmNorthstarThemeCustom/api/data.json"));
		}
		else if(file_exists($dir."/wp-content/themes/ibmNorthstarThemeDev/api/data.json"))
		{
			$data->data = json_decode(file_get_contents($dir."/wp-content/themes/ibmNorthstarThemeDev/api/data.json"));
		}
		else if(file_exists($dir."/wp-content/themes/ibmNorthstarTheme/api/data.json"))
		{
			$data->data = json_decode(file_get_contents($dir."/wp-content/themes/ibmNorthstarTheme/api/data.json"));
		}
		if(!isset($data->data))
		{
			$data->data = false;
		}
		array_push($foundBlogs,$data);
	}
}
file_put_contents($indexFileDirLocation . "/blog_data.json", json_encode($foundBlogs));
?>