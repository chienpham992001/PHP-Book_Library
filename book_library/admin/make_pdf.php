<?php 
	require_once 'fpdf.php';
        $pdf = new FPDF();
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont("Arial", "B", "16");

        $pdf->setTextColor(252, 2, 3);
        $pdf->Cell(200, 20, "Phieu muon sach", "0","1","C");

        $pdf->setLeftMargin(5);
        $pdf->setTextColor(0,0,0);

        // $pdf->Cell(20, 10, "Ma phieu", "", "", "C");
        // $pdf->Ln(10);
        // $pdf->Cell(40, 10, "Mã sinh viên", "1", "0", "C");
        // $pdf->Ln(10);
        
        // $pdf->Cell(20, 10, "Lớp", "1", "0", "C");
        // $pdf->Ln(10);
        // $pdf->Cell(40, 10, "Số điện thoại", "1", "1", "C");
        // $pdf->Ln(10);
        $pdf->SetFont("Arial", "", "10");

        require 'config.php';
        if(isset($_GET['id'])){
        	$id = $_GET['id'];

			$query = mysqli_query($conn, "SELECT * FROM book_borrow INNER JOIN book ON book_borrow.book_id = book.book_id INNER JOIN user ON user.user_id = book_borrow.user_id WHERE (oder_detail_id = '$id' AND status = 'Đang mượn')");
	        $q = mysqli_query($conn, "SELECT * FROM book_borrow INNER JOIN user on user.user_id = book_borrow.user_id WHERE oder_detail_id = '$id'");
	       	if($rw = mysqli_fetch_assoc($q)){	
	       		$pdf->Cell(20, 10, "Ma phieu:", "0", "0", "C");
	       		$pdf->Cell(43, 10, $rw['oder_detail_id'], "0", "0", "C");
	       		$pdf->Ln(10);
	       		$pdf->Cell(35, 10, "Ma sinh vien:", "0", "0", "C");
		        $pdf->Cell(38, 10, $rw['user_id'], "0", "0", "C");
		        $pdf->Ln(10);
		        $pdf->Cell(30, 10, "Ho va ten:", "0", "0", "C");
		        $pdf->Cell(56, 10, $rw['fullname'], "0", "0", "C");
		        $pdf->Ln(10);
		        $pdf->Cell(20, 10, "Lop:", "0", "0", "C");
		        $pdf->Cell(61, 10, $rw['class'], "0", "0", "C");
		        $pdf->Ln(10);
		        $pdf->Cell(34, 10, "So dien thoai:", "0", "0", "C");
		        $pdf->Cell(39, 10, $rw['phone'], "0", "0", "C");
		        $pdf->Ln(10);

	       	}


	       		$t = 0;
                $n = 0;
                $pdf->Cell(10, 10, "STT", "1", "0", "C");
	       		$pdf->Cell(70, 10, "Ten sach", "1", "0", "C");
		        $pdf->Cell(15, 10, "So luong", "1", "0", "C");
		        $pdf->Cell(20, 10, "Gia tien", "1", "0", "C");
		        $pdf->Cell(20, 10, "Thanh tien", "1", "0", "C");
		        $pdf->Cell(30, 10, "Ngay muon", "1", "0", "C");
		        $pdf->Cell(30, 10, "Ngay tra", "1", "1", "C");
	       	while($row = mysqli_fetch_assoc($query)){
	       		$n++;
                $tong = $row['cost']*$row['qty']; 
                $t += $tong;
                $pdf->Cell(10,10, $n , "1", "0", "C");
	       		$pdf->Cell(70, 10, $row['book_name'], "1", "0", "C");
		        $pdf->Cell(15, 10, $row['qty'], "1", "0", "C");
		        $pdf->Cell(20, 10, $row['cost'], "1", "0", "C");
		        $pdf->Cell(20, 10, $tong, "1", "0", "C");
		        $pdf->Cell(30, 10, $row['borrow_date'], "1", "0", "C");
		        $pdf->Cell(30, 10, $row['return_date'], "1", "1", "C");
	       	}
 			$pdf->Ln(10);

	       	$pdf->Cell(20, 10, "Tong tien:", "", "", "C");
	       	$pdf->Cell(43, 10, $t .' VND', "0", "0", "C");



        }
        
        $pdf->Output();


 ?>