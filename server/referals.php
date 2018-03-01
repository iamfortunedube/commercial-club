<?php
include("conn.php");

@$sql="select * from referals";

$result=$conn->query($sql);
while(@$userDetails = $result->fetch_assoc())
{
@$u_id=@$userDetails["id"];

$name=@$userDetails["name"]." ".@$userDetails["Surname"] ;
@$cellNumber=@$userDetails["c_phone"];
@$status=@$userDetails["status"];

if(@$status==0)
{
    @$status="Inactive";
}else{
    @$status="Active";
}
echo'
<tbody>
<tr>
<th scope="row">1</th>
<td>@$u_id</td>
<td>$nam</td>
<td>@$cellNumber</td>
<td>@$status</td>
</tr>
<tr>
';
}

?>