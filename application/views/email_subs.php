<!DOCTYPE html>
<html lang="en" style="box-sizing: border-box;">

<head style="box-sizing: border-box;">
	<title style="box-sizing: border-box;">Langganan Majalah BoBi</title>
	<meta charset="utf-8" style="box-sizing: border-box;">
	<meta name="viewport" content="width=device-width, initial-scale=1" style="box-sizing: border-box;">
	<style style="box-sizing: border-box;">
		* {
			box-sizing: border-box;
		}

		body {
			font-family: Arial, Helvetica, sans-serif;
		}

		/* Style the header */
		header {
			background-color: blue;
			padding: 8px;
			text-align: center;
			font-size: 35px;
			color: white;
		}


		article {
			float: left;
			padding: 20px;
			width: 100%;
			background-color: #f1f1f1;
			height: 300px;
			/* only for demonstration, should be removed */
		}

		/* Clear floats after the columns */
		section:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Style the footer */
		footer {
			background-color: orange;
			padding: 20px;
			/* text-align: center; */
            color: white;
            display: flex;
            position: fixed;
            justify-content: center;
            align-items: center;
            left: 0;
            bottom: 0;
            right: 0;
		}

		/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
		@media (max-width: 600px) {

			nav,
			article {
				width: 100%;
				height: auto;
			}
		}

	</style>
</head>

<body style="box-sizing: border-box;font-family: Arial, Helvetica, sans-serif;">


	<header style="box-sizing: border-box;background-color: blue;padding: 8px;text-align: center;font-size: 35px;color: white;">
	<img src="https://i.pinimg.com/280x280_RS/78/dc/ec/78dcec9df642ca047a12656f68171956.jpg">	
	<h2 style="box-sizing: border-box;">Majalah BoBi</h2>
	</header>

	<section style="box-sizing: border-box;">
		<article style="box-sizing: border-box;float: left;padding: 20px;width: 100%;background-color: #f1f1f1;height: 300px;">
			<h1 style="box-sizing: border-box;">Kepada Saudara {name}</h1>
			<p style="box-sizing: border-box;">Terima Kasih telah berlangganan majalah BoBi. Langganan kamu dimulai hari ini.</p>
			<p style="box-sizing: border-box;">Berikut kami kirimkan majalah BoBi edisi Agustus 2020</p>
		</article>
	</section>

	<footer style="box-sizing: border-box;background-color: orange;padding: 20px;color: white;display: flex;position: fixed;justify-content: center;align-items: center;left: 0;bottom: 0;right: 0;">
        <p style="text-align: center;box-sizing: border-box;">&copy; 2020 Majalah BoBi | Jalan Balai Pustaka Baru 1, Jakarta</p>
	</footer>

</body>

</html>
