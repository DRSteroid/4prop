<div class="newsList">

<div class="tittle"><h1>Pillanatképek<h1></div>
	<div class="screen">
		<?
		 $info = $param1->row();
		?>		
			<div class="content_submain_con">
						<div class="con_main">
							<!-- ?? -->
							<div class="board_view_n">
								<p class="board_view_name"><span>Téma</span><?=$info->note?></p>
							</div>
							<!-- ???/???? -->
							<div class="board_view_n board_view_n_writer">
								<p class="board_view_name"><span>Feltöltő</span><?=$info->user?></p>
								<p class="board_view_date"><span>Dátum</span> <?=date("Y/m/d H:i:s", strtotime($info->date))?></p>
							</div>
							<!-- ?? -->
							<div class="board_view_cont">
								<div class="board_view_content">
									<p style="text-align: center;">
									<a data-lightbox="images1" title="" href="<?=$this->config->item('base_url')?>design/img/screenshots/<?=$info->img?>">
									<img style="cursor: pointer;" class="cboxElement" id="__mce_tmp1" src="<?=$this->config->item('base_url')?>design/img/screenshots/<?=$info->img?>" alt="" height="240" width="320">
									</a></p>

								</div>
							</div>
							<!-- facebook share -->
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.6";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));</script>
							<div class="fb-like" data-href="http://beta.yirogames.com/main/screenshots/<?=$info->id?>" data-layout="standard" data-action="like" data-show-faces="true" data-colorscheme="dark" data-share="true"></div>
							<!-- ???? -->
							<div class="board_view_l">
								<p class="board_view_link">
									<img src="/design/img/icons/icon_url.gif" alt="URL" height="9" width="21">
									<img src="/design/img/icons/ic_link.png" id="imgGetUrl" alt="Copy Address" title="Copy Address" height="16" width="16">
									<?='http://'.$_SERVER['HTTP_HOST'].current_url();?>
								</p>
							</div>							
							<!-- ?? -->
							<div class="board_view_g">
								<p class="board_view_tag"><img src="/design/img/icons/icon_tag.gif" alt="TAG" height="9" width="21">
									<?=$info->tag?>
								</p>
	
							</div>
							<!-- ???? -->
							<div class="board_btn">
								<span class="btn"><a href="javascript:history.back()"><img src="/images/btn/btn_list.png" alt="VISSZA" height="46" width="107"></a></span>
								<div class="clearfloat"></div>

							</div>
							
							<!-- ?? ?? ? ?? -->

							<div id="divReplyForm">
							<div class="board_cmt_total">
								<img src="http://4story.zemigame.com/images/icon/ic_cmt2.gif" height="16" width="16">
								<span id="spanReplyCount"><?=$post=($info->post_count > 0) ? $info->post_count : 0 ?></span> hozzászólást írtak.
							</div>							
							<div class="board_cmt_box">
								<form id="formReply" name="formReply" method="post">
								<textarea id="textReplyContents" name="textReplyContents"></textarea>
									<input type="submit" name="submit" class="btn" value="KÜLDÉS">
								</form>
								<p><span id="spanReplyByte">0</span> / 300 karakter</p>
							</div></div>
							
							<div id="divReplyList">	
				<?foreach ($param3->result() as $row){?>

					<div class="board_cmt_view" id="divReply_0">
					<div class="board_cmt_view_name"><?=$row->username?></div>	
					<div class="board_cmt_view_con"><?=$row->post?></div>
					<div class="board_cmt_view_date"><?=date("Y/m/d H:i:s", strtotime($row->date))?>
					<?if ($this->session->userdata('dwUserID') == $row->user_id){?>
					<form id="formReply" name="formReply" method="post">
						<input type="hidden" name="deletReply" value="<?=$row->id?>" > 
						<input type="image" src="http://4story.zemigame.com/images/btn/btn_s_delete.gif" style="cursor:pointer;" align="texttop" height="11" width="11" id="imgReplyDelete_0" alt="Törlés" title="Törlés">
					</form>
					<?}?>	
					</div>								
					<div class="clearfloat"></div> 			
					</div>
				<?}?>
							</div>
						</div>
					</div>

	</div>
</div>
