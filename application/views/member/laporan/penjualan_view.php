<table class="table table-bordered table-striped table-condensed mb-none">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Satuan</th>
            <th>Harga Item</th>
            <th>Total Harga</th>
            <th>Stok Sisa</th>
        </tr>
    </thead>
    <tbody> 
<?php 
if (empty($posts)) {
    echo '<td colspan="8" align="center">Data Kosong</td>';
}else{
    foreach($posts->result_array() as $post): ?>
    <tr>
        <td><?php echo tgl_indo($post['tanggal']); ?></td>
        <td><?php
          $ci =& get_instance();
          $anabar = array();
          $nabar = $ci->db->query('SELECT * FROM penjualan_detail a join master_item b on a.kode_item =b.kode_item WHERE id_penjualan ='.$post['id']);
          echo "<ol>";
          foreach ($nabar->result() as $n) {
            echo "<li>".$n->nama_item."</li> ";
          }
          echo "</ol>";
          // echo $nabar->num_rows();
          // echo $post['id'];
        ?></td>
        <td><?php
          $ci =& get_instance();
          $anabar = array();
          $nabar = $ci->db->query('SELECT * FROM penjualan_detail a join master_item b on a.kode_item =b.kode_item WHERE id_penjualan ='.$post['id']);
          echo "<ol>";
          foreach ($nabar->result() as $n) {
            echo "<li>".$n->kuantiti." ".$n->satuan."</li> ";
          }
          echo "</ol>";
          // echo $nabar->num_rows();
          // echo $post['id'];
        ?></td>
        <td><?php
          $ci =& get_instance();
          $anabar = array();
          $nabar = $ci->db->query('SELECT * FROM penjualan_detail a WHERE id_penjualan ='.$post['id']);
          echo "<ol>";
          foreach ($nabar->result() as $n) {
            echo "<li>".rupiah($n->harga)."</li> ";
          }
          echo "</ol>";
          // echo $nabar->num_rows();
          // echo $post['id'];
        ?></td>
        <td><?php echo rupiah($post['total']); ?></td>
        <td><?php
          $ci =& get_instance();
          $anabar = array();
          $nabar = $ci->db->query('SELECT * FROM penjualan_detail a join master_item b on a.kode_item =b.kode_item  WHERE id_penjualan ='.$post['id']);
          echo "<ol>";
          foreach ($nabar->result() as $n) {
            echo "<li>".$n->stok_sisa." ".$n->satuan."</li> ";
          }
          echo "</ol>";
          // echo $nabar->num_rows();
          // echo $post['id'];
        ?></td>
    </tr>
    <?php endforeach;
    }
    ?>
    </tbody>
    </table>
    <ul class="pagination">
    <?php echo $this->ajax_pagination->create_links(); ?>
    </ul>
    