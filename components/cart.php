<?php

function cartElement($foodimg, $foodname, $foodprice, $foodid)
{
    $element = "
    
    <form action=\"cart.php?action=remove&id=$foodid\" method=\"post\">
    <tr>
    <td>
    <div class=\"cart_info\">
      <img src=$foodimg alt=\"food-item\">
      <div>
        <h4>$foodname</h4>
        <small>Rs. $foodprice</small>
        <br>
        <button class=\"removeBtn\" type=\"submit\" name=\"remove\">Remove</button>
      </div>
    </div>
  </td>
  <td><input class=\"qty_input\" type=\"number\" value=></td>
  <td>50000</td>
  </tr>
</form>
    
    ";
    echo  $element;
}
