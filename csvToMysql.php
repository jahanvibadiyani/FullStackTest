<?
// DB config

class CSVtoMySql
{
	     private $host;
		 private $user;
		 private $pass;
		 private $database;
		 private $filePath;
		 private $table;
		 private $csvDelimiter;

	function __construct()
    {
		 $this->host = 'localhost';
		 $this->user = 'root';
		 $this->pass = '';
		 $this->database = 'iStorage';
		 $this->filePath = 'userData/userData.csv';
		 $this->table = 'userData';
		 $this->csvDelimiter  = ',';
	}

	public function parseCSV()
	{       
		$results = array();
		$handle = fopen($this->filePath,'r');
		$row=1;
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE AND $row==1) {
                $columns = $data;
                $row++; 
		}
	  $coulumns = implode(",",$columns);
       $this->tableCreation($coulumns);
	  }

	  //helper functions
	 public function tableCreation($columns)
	{
		 $createSQL = "CREATE TABLE IF NOT EXISTS ". $this->table."( ".$columns.")"; 
		 //   (".implode(" VARCHAR(255) NOT NULL, ", $columns). " 
             //  VARCHAR(255) NOT NULL);";
          

		$file = $this->filePath;
		$loadSQL = "LOAD DATA INFILE '$file' 
					INTO TABLE $table 
					FIELDS TERMINATED BY ',' 
					IGNORE 1 LINES";

		// Open database connection 
		try { 
		   $dbh = new PDO("mysql:host=$host;dbname=$database",$username,$password); 
		   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		   // Execute queries
		   $S1TH = $dbh->query($createSQL); 
		   $S2TH = $dbh->query($loadSQL); 
		}
	   catch(PDOException $e) { 
          echo $e->getMessage(); 
        }
	} 
}	 

$ctm = new CSVtoMySql;
$output = $ctm->parseCSV();


?>