?>
            <form action="status.php?id=<?php echo $row['id']?>&status=<?php echo $row['status']?>" method='post' id='checkbox'>
                <input id='status' type='checkbox' onchange='Checkbox()'>
                <label for='status' id='stats'><?php $this->status?></label>
            </form>
            </td>
        
        <?php
            }else{
            //checked the checkbox if status = 1 or done
            ?>

            <form action="status.php?id=<?php echo $row['id']?>&status=<?php echo $row['status']?>" method='post' id='checkbox'>
                <input id='status' type='checkbox' onchange='Checkbox()' checked>
                <label for='status' id='stats'><?php $this->status?></label>
            </form>
            
            <?php