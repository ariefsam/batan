<?php
class pagination {

    private $config=array();

    public function initialize($config)
    {
        $this->config = $config;
    }

    public function show()
    {
        $config = $this->config;
        if($config['start']) $start      = $config['start']; else $start=0;//0
        $per_page   = $config['per_page']; //5
        $total      = $config['total_rows']; //13
        $base_url   = $config['base_url'];
        $variable   = $config['variable'];//s

        $jumlah_hal = ceil($total/$per_page); // 13/5 =3
        $active = floor($start/$per_page)+1;
        $sebelum    = ($active-2) * $per_page;
        $setelah    = ($active) * $per_page;

        if($jumlah_hal>1)
        {
            if($start!=0)
            { ?>
<a href="<?php echo $base_url.$variable."=".$sebelum?>">&lt;</a>
<?php       }

            for($i=1; $i<=$jumlah_hal; $i++)
            {?>
<?php if($i==$active) echo "<strong>$i</strong>";
else {?>
 <a href="<?php echo $base_url.$variable."=".(($i-1)*$per_page)?>"><?php echo $i?></a>
<?php }
            }

            if ($active != $jumlah_hal) { ?>
 <a href="<?php echo $base_url.$variable."=".$setelah?>">&gt;</a>
<?php }
        }
    }

}