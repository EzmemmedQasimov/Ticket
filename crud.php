<?php 


 class CRUD{

     public function Insert($table,$col,$arr)
    {
        global $db;
        $ins = $db->prepare("INSERT into $table set $col");
        return $ins->execute($arr)==1 ? 1 : 0;
    }
    public function Select($table,$multi=0,$col="*",$where=null,$arr=null)
    {
        global $db;
        $slc = $db->prepare("SELECT $col from $table $where");
        $slc->execute($arr);
        return $multi==0 ? $slc->fetch(PDO::FETCH_ASSOC) : $slc->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Delete($table,$col=null,$arr=null)
    {
        global $db;
        $dlt = $db->prepare("DELETE from $table $col");
        return $dlt->execute($arr)==1 ? 1 : 0;
    }
    public function Update($table,$col,$arr)
    {
        global $db;
        $upt = $db->prepare("UPDATE $table set $col");
        $upt->execute($arr)==1 ? 1 : 0;
    }
 }