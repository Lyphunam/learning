<?php
if($_SESSION['sinhvien']){
	include_once('views/sinhvien/headersinhvien.php');
	
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
											<button type="submit" name="ntgv" class="btn btn-success mr-2">Bắt đầu nhắn tin</button>
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
											<button type="submit" name="ntsv" class="btn btn-success mr-2">Bắt đầu nhắn tin</button>
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
							if (isset($_POST['ntsv'])) {
								$machatsv = $_POST['masinhvien'];
								$_SESSION['machatsv'] = $machatsv;
								if (isset($_SESSION['machatgv'])) {
									unset($_SESSION['machatgv']);
								}
							}
							if (isset($_POST['ntgv'])) {
								$machatgv = $_POST['magiaovien'];
								$_SESSION['machatgv'] = $machatgv;
								if (isset($_SESSION['machatsv'])) {
									unset($_SESSION['machatsv']);
								}
							}		
								?>
								<!-- Nhắn tin sinh viên -->
								<?php
									if (isset($_SESSION['machatsv'])) {
										// echo $_SESSION['machatsv'];
										$infosv = $db->inFoSVbyID($_SESSION['machatsv']);
										$name1 = $_SESSION['machatsv'];
										$name2 = $_SESSION['sinhvien'];
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
										if($db->checkUSER($nametb,$_SESSION['machatsv']) == true){
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
															<div class="received_withd_msg <?php echo $_SESSION['machatsv'];?>">
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
															<div class="sent_msg" <?php echo $_SESSION['sinhvien'];?>>
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
															<div class="received_withd_msg <?php echo $_SESSION['machatsv'];?>">
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
															<div class="sent_msg" <?php echo $_SESSION['sinhvien'];?>>
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
																	<input type="hidden" id="machathidden1" name="machathidden1" value="<?php echo $_SESSION['machatsv'];?>" />
																	<input type="hidden" id="machathidden2" name="machathidden2" value="<?php echo $_SESSION['sinhvien'];?>" />
																	<input onmousedown="CheckSeenMessSVSV()" type="text" id="tin_nhan" name="tin_nhan" class="write_msg" placeholder="Type a message" />
																	<button class="msg_send_btn" type="submit" name="sendsvsv"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
																</form>
																
																<?php
																	if (isset($_POST['sendsvsv'])) {
																		if($db->checkUSER($nametb,$_SESSION['machatsv']) == true){
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
									if (isset($_SESSION['machatgv'])) {
										// echo $_SESSION['machatsv'];
										$infogv = $db->inFoGVbyID($_SESSION['machatgv']);
										$name1 = $_SESSION['machatgv'];
										$name2 = $_SESSION['sinhvien'];
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
										if($db->checkUSER($nametb,$_SESSION['machatgv']) == true){
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
															<div class="received_withd_msg <?php echo $_SESSION['machatgv'];?>">
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
															<div class="sent_msg" <?php echo $_SESSION['sinhvien'];?>>
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
															<div class="received_withd_msg <?php echo $_SESSION['machatgv'];?>">
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
															<div class="sent_msg" <?php echo $_SESSION['sinhvien'];?>>
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
																	<input type="hidden" id="machathidden1" name="machathidden1" value="<?php echo $_SESSION['machatgv'];?>" />
																	<input type="hidden" id="machathidden2" name="machathidden2" value="<?php echo $_SESSION['sinhvien'];?>" />
																	<input type="hidden" id="checkSeenSVGV" name="checkSeenSVGV" value="1" />
																	<input onmousedown="CheckSeenMessSVGV()" type="text" id="tin_nhan" name="tin_nhan" class="write_msg" placeholder="Type a message" />
																	<button class="msg_send_btn" type="submit" name="sendgv"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
																</form>
																<?php
																	if (isset($_POST['sendgv'])) {
																		if($db->checkUSER($nametb,$_SESSION['machatgv']) == true){
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
						<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019.</span>
						<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
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
		unset($_SESSION['sinhvien']);
		unset($_SESSION['tensinhvien']);
		if ($_SESSION['machatsv']) {
			unset($_SESSION['machatsv']);
		}
		header("location:index.php?controller=user&action=login");
	}
}

else{
	header("location:index.php?controller=user&action=login");
}
?>