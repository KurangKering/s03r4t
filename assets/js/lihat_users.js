				//Tampilkan Modal 
				function showModals( id )
				{

					clearModals();

				// Untuk Eksekusi Data Yang Ingin di Edit atau Di Hapus 
				if( id )
				{
					$.ajax({
						type: "POST",
						url: "dummy",
						dataType: 'json',
						data: {id:id,type:"get"},
						success: function(res) {
							console.log(res);

							setModalData( res );
						}
					});
				}
				
			}

			//Data Yang Ingin Di Tampilkan Pada Modal Ketika Di Edit 
			function setModalData( data )
			{
				
				$("#username").text(data.slice(-1)[0]);
				for (var i = 0; i < data.length - 1; i++) {
					$("#groups").append("<li>"+data[i].name+"</li>");
				}
				
				$("#myModals").modal("show");
			}
			
			//Clear Modal atau menutup modal supaya tidak terjadi duplikat modal
			function clearModals()
			{
				
				$("#username").text("");
				$("#groups").empty();
				
			}