<?php 
function showError($errors, $name)
{
    if($errors->has($name)){
        return   '<div class="alert alert-danger" role="alert">
        <strong>'.$errors->first($name).'</strong></div>';
    }
  
}
function GetCategory($category,$parent,$shift,$select){
    foreach($category as $row){
        if($row['parent']==$parent){
            if($row['id']==$select){
                echo "<option selected value=".$row['id']." >".$shift.$row['name']."</option>";
            }else {
                echo "<option value=".$row['id']." >".$shift.$row['name']."</option>";
            }
            GetCategory($category,$row['id'],$shift."-->",$select);
        }
    }
}
function ShowCategory($category,$parent,$shift){
    foreach($category as $row){
        if($row['parent']==$parent){
            echo '<div class="item-menu"><span>'.$shift.$row["name"].'</span>
            <div class="category-fix">
                <a class="btn-category btn-primary" href="admin/category/edit/'.$row['id'].'"><i class="fa fa-edit"></i></a>
                <a class="btn-category btn-danger" href="admin/category/del/'.$row['id'].'"><i class="fas fa-times"></i></i></a>
            </div>
        </div>';
        ShowCategory($category,$row['id'],$shift."-->");
        }       
    }
}
function GetLevel($mang,$parent,$count)
{
	
 foreach($mang as $row)
 {
   if($row["id"]==$parent)
   {
       $count++;
	   
	   if($row["parent"]==0)
	   {
	     return $count;
	   }
	   return Getlevel($mang,$row["parent"],$count);
   
   }
 
 }
}