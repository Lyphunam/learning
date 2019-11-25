<?php
if($_SESSION['giaovien']){
	include_once('views/giaovien/headergiaovien.php');
	
	?>
	
	<!-- partial -->
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-md-5 d-flex align-items-stretch grid-margin">
					<div class="row flex-grow">
						<div class="col-12">
							<div class="card" style="height: 500px;">
								<div class="card-body">
									<h4 class="card-title">Chọn tên giáo viên hoặc sinh viên</h4>

									<form class="forms-sample" method="post">
										<div class="form-group">
											<label for="exampleFormControlSelect1">Nhập tên</label>
											<input type="text" name="tentimkiem" class="form-control" placeholder="Nhập tên bạn muốn tìm">
										</div>
										<div class="form-group">
											<div class="row" style="width: 100%;">
												<button type="submit" name="timkiemtengv" class="btn btn-success mr-2 col-sm-5">Tìm kiếm Giáo Viên</button>
												<button type="submit" name="timkiemtensv" class="btn btn-success mr-2 col-sm-5">Tìm kiếm Sinh Viên</button>
											</div>
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Giáo viên</label>
											<?php
											if (isset($_POST['timkiemtengv']) && !empty($_POST['tentimkiem'])) {
												$name = $_POST['tentimkiem'];
												$datatk = $db->search_gv($name);
												?>
												<select class="form-control form-control-lg" id="exampleFormControlSelect1" name="magiaovien">
													<?php
													for ($i=0; $i < count($datatk); $i++) { 
														?>
														<option value="<?php echo $datatk[$i]['MAGIAOVIEN'];?>"><?php echo $datatk[$i]['TENGIAOVIEN'];?></option>
														<?php
													}
													?>
												</select>
												<?php
											}else{
												?>
												<select class="form-control form-control-lg" id="exampleFormControlSelect1" name="magiaovien">
													<?php
													for ($i=0; $i < $countgv; $i++) { 
														?>
														<option value="<?php echo $datagv[$i]['MAGIAOVIEN'];?>"><?php echo $datagv[$i]['TENGIAOVIEN'];?></option>
														<?php
													}
													?>
												</select>
												<?php
											}
											?>
										</div>
										<div class="form-group">
											<button type="submit" name="ntgv1" class="btn btn-success mr-2">Bắt đầu nhắn tin</button>
										</div>
										<div class="form-group">
											<label for="exampleFormControlSelect1">Sinh viên</label>
											<?php
											if (isset($_POST['timkiemtensv']) && !empty($_POST['tentimkiem'])) {
												$name = $_POST['tentimkiem'];
												$datatk = $db->search_sv($name);
												?>
												<select class="form-control form-control-lg" id="exampleFormControlSelect1" name="masinhvien">
													<?php
													for ($i=0; $i < count($datatk); $i++) { 
														?>
														<option value="<?php echo $datatk[$i]['MASV'];?>"><?php echo $datatk[$i]['TENSV'];?></option>
														<?php
													}
													?>
												</select>
												<?php
											}else{
												?>
												<select class="form-control form-control-lg" id="exampleFormControlSelect1" name="masinhvien">
													<?php
													for ($i=0; $i < $countsv; $i++) { 
														?>
														<option value="<?php echo $datasv[$i]['MASV'];?>"><?php echo $datasv[$i]['TENSV'];?></option>
														<?php
													}
													?>
												</select>
												<?php
											}
											?>
										</div>
										<div class="form-group">
											<button type="submit" name="ntsv1" class="btn btn-success mr-2">Bắt đầu nhắn tin</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="col-md-7 grid-margin stretch-card">
					<div class="card" style="height: 500px;">
						<div class="card-body">

							<!-- nd -->
							<?php
							if (isset($_POST['ntsv1'])) {
								$machatsv1 = $_POST['masinhvien'];
								$_SESSION['machatsv1'] = $machatsv1;
								if (isset($_SESSION['machatgv1'])) {
									unset($_SESSION['machatgv1']);
								}
							}
							if (isset($_POST['ntgv1'])) {
								$machatgv1 = $_POST['magiaovien'];
								$_SESSION['machatgv1'] = $machatgv1;
								if (isset($_SESSION['machatsv1'])) {
									unset($_SESSION['machatsv1']);
								}
							}		
								?>
								<!-- Nhắn tin sinh viên -->
								<?php
									if (isset($_SESSION['machatsv1'])) {
										// echo $_SESSION['machatsv'];
										$infosv = $db->inFoSVbyID($_SESSION['machatsv1']);
										$name1 = $_SESSION['machatsv1'];
										$name2 = $_SESSION['giaovien'];
										$file_name1 = $name1.$name2.".txt";
										$file_name2 = $name2.$name1.".txt";
										if (file_exists("assets/chat/".$file_name1)) {
											$file_name = $file_name1;
											$nametb = $name1.$name2;
										}
										else{
											$myfile = fopen("assets/chat/".$file_name2, "a");
											$file_name = $file_name2;
											$nametb = $name2.$name1;
										}
										$db->AdDataThongBaoTinNhan($nametb,$name1,$name2,'0','0');
										if($db->checkUSER($nametb,$_SESSION['machatsv1']) == true){
											$db->changeSTTSeenMessU1($nametb);
										}
										else{
											$db->changeSTTSeenMessU2($nametb);
										}
								?>
								<div class="container">
									
									<div class="messaging">
										<p class=" text-center">
											Bạn đang nhắn tin với: <?php echo $infosv['TENSV'];?>
										</p>
										<div class="inbox_msg">
											<div class="mesgs">
												<div class="msg_history">
													<?php
														$f = fopen("assets/chat/".$file_name, "r") or die("khong mo duoc file");
														while (!feof($f)) {
															$nd = fgets($f);
															$mang = explode("-", $nd);




														if ($file_name == $file_name1) {
															if ($mang[0] == 'may2') {
													?>	
													<!-- incoming_msg -->
													<div class="incoming_msg">
														
														<div class="received_msg" style="margin: 5px;">
															<div class="received_withd_msg <?php echo $_SESSION['machatsv1'];?>">
																<p><?php echo $mang[1];?>
																</p>
																<!-- <span class="time_date"> 11:01 AM    |    June 9</span> -->
															</div>
															</div>
														</div>
														<?php
																}else if($mang[0] == 'may1'){
														?>
														<!-- outgoing_msg -->
														<div class="outgoing_msg" style="margin: 5px;">
															<div class="sent_msg" <?php echo $_SESSION['giaovien'];?>>
																<p><?php echo $mang[1];?></p>
																<!-- <span class="time_date"> 11:01 AM    |    June 9</span>  -->
															</div>
															</div>
															<?php
																	}
																}

														if ($file_name == $file_name2) {
															if ($mang[0] == 'may1') {
													?>	
													<!-- incoming_msg -->
													<div class="incoming_msg">
														
														<div class="received_msg" style="margin: 5px;">
															<div class="received_withd_msg <?php echo $_SESSION['machatsv1'];?>">
																<p><?php echo $mang[1];?>
																</p>
																<!-- <span class="time_date"> 11:01 AM    |    June 9</span> -->
															</div>
															</div>
														</div>
														<?php
																}else if($mang[0] == 'may2'){
														?>
														<!-- outgoing_msg -->
														<div class="outgoing_msg" style="margin: 5px;">
															<div class="sent_msg" <?php echo $_SESSION['giaovien'];?>>
																<p><?php echo $mang[1];?></p>
																<!-- <span class="time_date"> 11:01 AM    |    June 9</span>  -->
															</div>
															</div>
															<?php
																	}
																}
																}
															?>
														</div>
														
													</div>
												</div>
											</div>
										</div>
										<div class="type_msg">
															<div class="input_msg_write">
																<form id="chatbox" action="" method="post">
																	<input type="hidden" id="machathidden1" name="machathidden1" value="<?php echo $_SESSION['machatsv1'];?>" />
																	<input type="hidden" id="machathidden2" name="machathidden2" value="<?php echo $_SESSION['giaovien'];?>" />
																	<input type="hidden" id="checkSeenGVSV" name="checkSeenGVSV" value="1" />
																	<input onmousedown="CheckSeenMessGVSV()" type="text" id="tin_nhan" name="tin_nhan" class="write_msg" placeholder="Type a message" />
																	<button class="msg_send_btn" type="submit" name="sendsv"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
																</form>
																<?php
																	if (isset($_POST['sendsv'])) {
																		if($db->checkUSER($nametb,$_SESSION['machatsv1']) == true){
																			$db->changeSTTU2($nametb);
																		}
																		else{
																			$db->changeSTTU1($nametb);
																		}
																	}
																?>
															</div>
														</div>
									<?php }?>
									<!-- End nhắn tin sinh viên -->

									<!-- Sinh viên nhắn tin giáo viên -->
									<?php
									if (isset($_SESSION['machatgv1'])) {
										// echo $_SESSION['machatsv'];
										$infogv = $db->inFoGVbyID($_SESSION['machatgv1']);
										$name1 = $_SESSION['machatgv1'];
										$name2 = $_SESSION['giaovien'];
										$file_name1 = $name1.$name2.".txt";
										$file_name2 = $name2.$name1.".txt";
										if (file_exists("assets/chat/".$file_name1)) {
											$file_name = $file_name1;
											$nametb = $name1.$name2;
										}
										else{
											$myfile = fopen("assets/chat/".$file_name2, "a");
											$file_name = $file_name2;
											$nametb = $name2.$name1;
										}
										$db->AdDataThongBaoTinNhan($nametb,$name1,$name2,'0','0');
										if($db->checkUSER($nametb,$_SESSION['machatgv1']) == true){
											$db->changeSTTSeenMessU1($nametb);
										}
										else{
											$db->changeSTTSeenMessU2($nametb);
										}
								?>
								<div class="container">
									
									<div class="messaging">
										<p class=" text-center">
											Bạn đang nhắn tin với: <?php echo $infogv['TENGIAOVIEN'];?>
										</p>
										<div class="inbox_msg">
											<div class="mesgs">
												<div class="msg_history">
													<?php
														$f = fopen("assets/chat/".$file_name, "r") or die("khong mo duoc file");
														while (!feof($f)) {
															$nd = fgets($f);
															$mang = explode("-", $nd);




														if ($file_name == $file_name1) {
															if ($mang[0] == 'may2') {
													?>	
													<!-- incoming_msg -->
													<div class="incoming_msg">
														
														<div class="received_msg" style="margin: 5px;">
															<div class="received_withd_msg <?php echo $_SESSION['machatgv1'];?>">
																<p><?php echo $mang[1];?>
																</p>
																<!-- <span class="time_date"> 11:01 AM    |    June 9</span> -->
															</div>
															</div>
														</div>
														<?php
																}else if($mang[0] == 'may1'){
														?>
														<!-- outgoing_msg -->
														<div class="outgoing_msg" style="margin: 5px;">
															<div class="sent_msg" <?php echo $_SESSION['giaovien'];?>>
																<p><?php echo $mang[1];?></p>
																<!-- <span class="time_date"> 11:01 AM    |    June 9</span>  -->
															</div>
															</div>
															<?php
																	}
																}

														if ($file_name == $file_name2) {
															if ($mang[0] == 'may1') {
													?>	
													<!-- incoming_msg -->
													<div class="incoming_msg">
														
														<div class="received_msg" style="margin: 5px;">
															<div class="received_withd_msg <?php echo $_SESSION['machatgv1'];?>">
																<p><?php echo $mang[1];?>
																</p>
																<!-- <span class="time_date"> 11:01 AM    |    June 9</span> -->
															</div>
															</div>
														</div>
														<?php
																}else if($mang[0] == 'may2'){
														?>
														<!-- outgoing_msg -->
														<div class="outgoing_msg" style="margin: 5px;">
															<div class="sent_msg" <?php echo $_SESSION['giaovien'];?>>
																<p><?php echo $mang[1];?></p>
																<!-- <span class="time_date"> 11:01 AM    |    June 9</span>  -->
															</div>
															</div>
															<?php
																	}
																}
																}
															?>
														</div>
														
													</div>
												</div>
											</div>
										</div>
										<div class="type_msg">
															<div class="input_msg_write">
																<form id="chatbox" action="" method="post">
																	<input type="hidden" id="machathidden1" name="machathidden1" value="<?php echo $_SESSION['machatgv1'];?>" />
																	<input type="hidden" id="machathidden2" name="machathidden2" value="<?php echo $_SESSION['giaovien'];?>" />
																	<input type="hidden" id="checkSeenGVGV" name="checkSeenGVGV" value="1" />
																	<input onmousedown="CheckSeenMessGVGV()" type="text" id="tin_nhan" name="tin_nhan" class="write_msg" placeholder="Type a message" />
																	<button class="msg_send_btn" type="submit" name="sendgvgv"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
																</form>
																<?php
																	if (isset($_POST['sendgvgv'])) {
																		if($db->checkUSER($nametb,$_SESSION['machatgv1']) == true){
																			$db->changeSTTU2($nametb);
																		}
																		else{
																			$db->changeSTTU1($nametb);
																		}
																	}
																?>
															</div>
														</div>
									<?php }?>
									<!-- End nhắn sinh viên nhắn tin giáo viên -->
									<!-- end nd -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
					<div class="container-fluid clearfix">
						<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019. Edit By TCU-Learning.</span>
						<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Nguyễn Công Minh
							<i class="mdi mdi-heart text-danger"></i>
						</span>
					</div>
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- scrip nhan tin -->
	
<!-- end script nhan tin -->
<?php
if (isset($_POST['signout'])) {
		unset($_SESSION['giaovien']);
		unset($_SESSION['tengiaovien']);
		if ($_SESSION['machatsv1']) {
			unset($_SESSION['machatsv1']);
		}
		if ($_SESSION['machatgv1']) {
			unset($_SESSION['machatgv1']);
		}
		header("location:index.php?controller=user&action=login");
	}
}

else{
	header("location:index.php?controller=user&action=login");
}
?>