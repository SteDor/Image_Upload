<?php 

 
class Database {
  
    function __construct(public $servername, public $username, public $password, public $databasename){}

    public function checkConnection($conn) {
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        }
    public function addPreparedStatmentFile($servername, $username, $password, $databasename, $originalFileName, $systemName){
        $conn = new mysqli($servername, $username, $password, $databasename);

        // Check connection
        $this->checkConnection($conn);

        // prepare and bind
        $stmt = $conn->prepare("INSERT INTO files (OriginalName, SystemName) VALUES (?, ?)");
        $stmt->bind_param("ss", $originalFileName, $SystemName);

            $OriginalFileName = $originalFileName;
            $SystemName = $systemName;
            $stmt->execute();
            
            // echo ('created');
        $stmt->close();
        $conn->close();
    }

    // check if $SystemName isnt used

    public function checkIfSysNameIsTaken() {

    }
      
    

    public function checkSystemName($servername, $username, $password, $databasename, $systemname) {
        
        $conn = new mysqli($servername, $username, $password, $databasename);
        // Check connection
        $this->checkConnection($conn);
        //SELECT SystemName FROM `files` WHERE SystemName = 510359839842; 
        if(($sql = "SELECT SystemName FROM `files` WHERE SystemName =" .  $systemname) == $systemname)
        {
        echo "<br>____________IN DB___________<br>";
        
        $systemname = rand(100000000000,999999999999);
        echo $systemname;
        $conn->close();
        return $systemname;}

        else {
            // echo 'File Not Found';
            $conn->close(); 
            return $systemname; 
            
        }
        
    }
    
    
    public function selectAllFiles($servername, $username, $password, $databasename){
        // Create connection
        $conn = new mysqli($servername, $username, $password, $databasename);
        // Check connection
        $this->checkConnection($conn);
      
        $sql = "SELECT * FROM `files`";
        $result = $conn->query($sql);
      
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo"<tr><td>" . $row["FileID"]. "</td><td>" 
              . $row["OriginalName"]. "</td><td>" 
              . $row["SystemName"]. "</td></tr>";
            
            //echo ("id: " . $row["FileID"].
            //"<br> - Original Name: " . $row["OriginalName"]. 
            //"<br>Systhem Name: " . $row["SystemName"]. "<br><hr>");
          }
        } else {
          echo "0 results";
        }
        $conn->close();
      }

    
    }
  ?>