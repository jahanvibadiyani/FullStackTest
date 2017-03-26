<?php
 
class iStorageImple implements iStorage
{
	private $dir;

	function __construct()
    {
		$this->dir = 'userData';
		$this->filename = 'userData.csv';
    }

	public function save($content)
    {
	
        if(!is_dir($this->dir)) {
            mkdir($this->dir);
        }

       $filename = $this->dir.'/'.$this->filename;
       $this->outputCsv($filename,$content);
    }

   // Function to write data to CSV file
	public function outputCsv($fileName, $dataArray)
	{
		if(!isset($fileName))
        {
			if(isset($dataArray[0])){	
				$fp = fopen($fileName, 'w');
				fputcsv($fp, array_keys($dataArray['0']));
				foreach($dataArray AS $values){
					fputcsv($fp, $values);
				}
				fclose($fp);
			}
			ob_flush();
		}
		else
        {
			$fp = fopen($fileName, "a");			
			foreach($dataArray AS $values){
					fputcsv($fp, $values);
				}

		}
		
	}
}
