<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $Lang->get('LISTMEMBERS__TITLE'); ?></h3>
        </div>
        <hr>
        <div class="box-body">
            <?php foreach($users as $k=>$v): $v = current($v); ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <img width="30px;" src="<?= $this->Html->url('/API/get_head_skin/'.$v['pseudo']) ?>/30" class="img-circle"> | <?= $v['pseudo']; ?>
                <a id="btn-user-<?= $v['id']; ?>" style="cursor: pointer;" onclick="AffCachInfosUser('<?= $v['id']; ?>');" class="pull-right"><i style="font-size: 20px; margin-top: 10px;" class="fa fa-plus"></i></a>
              </div>
              <div style="display:none;" id="user-<?= $v['id']; ?>" class="panel-body">
                <table class="table table-hover" id="users">
                  <tbody>
                   <?php if($permGetMailEtat == 1){ ?>
                   <tr>
                    <td><?= $Lang->get('LISTMEMBERS__EMAIL') ?></td>
                    <td><a href="mailto:<?= $v['email'] ?>"><?= $v['email'] ?></a></td>
                   </tr>
                   <?php }?>
                   <tr>
                     <td><?= $Lang->get('LISTMEMBERS__CREATE') ?></td>
                     <td><?= $Lang->date($v['created']); ?></td>
                   </tr>
                   <tr>
                     <td><?= $Lang->get('LISTMEMBERS__RANK') ?></td>
                     <td>
                     <?php
                       if($v['rank'] == 0)
                       {
                         echo $Lang->get('LISTMEMBERS__RANK_MEMBER');
                       }elseif($v['rank'] == 2){
                         echo $Lang->get('LISTMEMBERS__RANK_MODERATOR');
                       }elseif($v['rank'] == 3){
                         echo $Lang->get('LISTMEMBERS__RANK_ADMINISTRATOR');
                       }elseif($v['rank'] == 4){
                         echo $Lang->get('LISTMEMBERS__RANK_ADMINISTRATOR');
                       }elseif($v['rank'] == 5){
                         echo $Lang->get('LISTMEMBERS__RANK_BANNED');
                       }else{
                        foreach ($available_ranks as $key => $value) {
                          if ($v['rank'] == $key) {
                              echo $value;
                          }
                        } 
                       }
                     ?>
                     </td>
                   </tr>
                  </tbody>
                </table>
              </div>
              <div style="display:none;" id="user-<?= $v['id']; ?>-foot" class="panel-footer">
                <a href="/list/profil/?id=<?= $v['id']; ?>" class="btn btn-primary btn-block">
                  <?php if($v['id'] == $user['id']){ ?>
                    <?= $Lang->get('LISTMEMBERS__PRF_YOU') ?>
                  <?php }else{ ?>
                    <?= $Lang->get('LISTMEMBERS__PRF') ?>
                  <?php }?>
                </a>
              </div>
            </div>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function AffCachInfosUser(idUserInfos)
{
   var x = document.getElementById('user-'+idUserInfos).style.display;
   var y = document.getElementById('user-'+idUserInfos+'-foot').style.display;
   if(x == 'none' && y == 'none')
   {
     document.getElementById('user-'+idUserInfos).style.display = '';
     document.getElementById('user-'+idUserInfos+'-foot').style.display = '';
     document.getElementById('btn-user-'+idUserInfos).innerHTML = '<i style="font-size: 20px; margin-top: 10px;" class="fa fa-minus"></i>';
   }else if(x == '' && y == ''){
     document.getElementById('user-'+idUserInfos).style.display = 'none';
     document.getElementById('user-'+idUserInfos+'-foot').style.display = 'none';
     document.getElementById('btn-user-'+idUserInfos).innerHTML = '<i style="font-size: 20px; margin-top: 10px;" class="fa fa-plus"></i>';
   }
}
</script>
