<script type="text/javascript">
	/*
	 Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
	 Version: 2.1.0
	 Author: Sean Ngu
	 Website: http://www.seantheme.com/color-admin-v2.1/admin/html/
	 */
	var blue = "#348fe2", blueLight = "#5da5e8", blueDark = "#1993E4", aqua = "#49b6d6", aquaLight = "#6dc5de",
	    aquaDark = "#3a92ab", green = "#00acac", greenLight = "#33bdbd", greenDark = "#008a8a", orange = "#f59c1a",
	    orangeLight = "#f7b048", orangeDark = "#c47d15", dark = "#2d353c", grey = "#b6c2c9", purple = "#727cb6",
	    purpleLight = "#8e96c5", purpleDark = "#5b6392", red = "#ff5b57";
	
	
	var handleDonutChart = function () {
	    "use strict";
	    if ($("#donut-chart").length !== 0) {
	        var e = [{label: "Chrome", data: 35, color: purpleDark}, {
	            label: "Firefox",
	            data: 30,
	            color: purple
	        }, {label: "Safari", data: 15, color: purpleLight}, {label: "Opera", data: 10, color: blue}, {
	            label: "IE",
	            data: 5,
	            color: blueDark
	        }];
	        $.plot("#donut-chart", e, {
	            series: {pie: {innerRadius: .5, show: true, label: {show: true}}},
	            legend: {show: true}
	        })
	    }
	};
	var handleTotalCard = function () {
	    "use strict";
	    $.ajax({
	    	url:"<?=site_url();?>home/ajax_total_card",
	    	method:"GET",
	    	dataType:"JSON",
	    	success:function(dat){
	    		const {status} = dat;
	    		if(status){
	    			const {results} = dat;
	    			$('#total-item-kategori').text(results.kategori);
	    			$('#total-item-produk').text(results.item);
	    			$('#total-pemasok').text(results.pemasok);
	    			$('#total-pelanggan').text(results.pelanggan);
	    		}
	    	}
	    })
	};
	var handleTotalPenjualan = function () {
	    "use strict";
	    $.ajax({
	    	url:"<?=site_url();?>home/ajax_total_sales",
	    	method:"GET",
	    	dataType:"JSON",
	    	success:function(dat){
	    		const {status} = dat;
	    		if(status){
	    			const {results} = dat;
	    			$('#sales-hari').text(results.hari);
	    			$('#sales-bulan').text(results.bulan);
	    			$('#sales-tahun').text(results.tahun);
	    		}
	    	}
	    })
	};
	var handleLastTransaction = function () {
	    "use strict";
	    $.ajax({
	    	url:"<?=site_url();?>home/ajax_last_transaction",
	    	method:"GET",
	    	dataType:"JSON",
	    	success:function(dat){
	    		const {status} = dat;
	    		if(status){
	    			const {results} = dat;
	    			$.map(results.data, function(x,i){
	    				var _html = `<tr>
										<td>`+x.sale_date+`</td>
										<td>`+x.quantity+`</td>
										<td>`+x.subtotal+`</td>
										<td>`+x.tax+`</td>
										<td>`+x.total+`</td>
									</tr>`;
						$('#table-last-trans tbody').append(_html)
	    			})
	    		}
	    	}
	    })
	};

	var handleSalesByBulan = function () {
	    "use strict";
	    $.ajax({
	    	url:"<?=site_url();?>home/ajax_sales_bybulan",
	    	method:"GET",
	    	dataType:"JSON",
	    	success:function(dat){
	    		const {status} = dat;
	    		if(status){
	    			const {results} = dat;
	    			_generate_bar(results,"bar-sales-bybulan");
	    		}
	    	}
	    })
	};

	var handleSalesBykategori = function () {
	    "use strict";
	    $.ajax({
	    	url:"<?=site_url();?>home/ajax_sales_bykategori",
	    	method:"GET",
	    	dataType:"JSON",
	    	success:function(dat){
	    		const {status} = dat;
	    		if(status){
	    			const {results} = dat;
	    			_generate_bar(results,"bar-sales-bykategori");
	    		}
	    	}
	    })
	};

	var handleSalesLineByBulan = function () {
	    "use strict";
	    $.ajax({
	    	url:"<?=site_url();?>home/ajax_sales_line_bybulan",
	    	method:"GET",
	    	dataType:"JSON",
	    	success:function(dat){
	    		const {status} = dat;
	    		if(status){
	    			const {results} = dat;
	    			_generate_line(results,"line-sales-bybulan");
	    		}
	    	}
	    })
	};

	function _generate_bar(results,komp){
		"use strict";
		am5.ready(function() {
		  var root = am5.Root.new(komp);
		  root.setThemes([
		    am5themes_Animated.new(root)
		  ]);

		  var chart = root.container.children.push(am5xy.XYChart.new(root, {
		    panX: false,
		    panY: false,
		  }));
		  var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
		  cursor.lineY.set("visible", false);

		  var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 15 });
		  xRenderer.labels.template.setAll({
		    rotation: -30,
		    paddingRight: 0
		  });

		  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
		    maxDeviation: 0.1,
		    categoryField: "unit",
		    renderer: xRenderer,
		    tooltip: am5.Tooltip.new(root, {})
		  }));

		  var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
		    maxDeviation: 0.3,
		    renderer: am5xy.AxisRendererY.new(root, {})
		  }));

		  var series = chart.series.push(am5xy.ColumnSeries.new(root, {
		    name: "Series 1",
		    xAxis: xAxis,
		    yAxis: yAxis,
		    valueYField: "value",
		    sequencedInterpolation: true,
		    categoryXField: "unit",
		    tooltip: am5.Tooltip.new(root, {
		      labelText:"{valueY}",
		    })
		  }));

		  series.columns.template.setAll({ cornerRadiusTL: 0, cornerRadiusTR: 0 });
		  series.columns.template.adapters.add("fill", function(fill, target) {
		    return chart.get("colors").getIndex(series.columns.indexOf(target));
		  });

		  series.columns.template.adapters.add("stroke", function(stroke, target) {
		    return chart.get("colors").getIndex(series.columns.indexOf(target));
		  });

		  // baru
		  series.bullets.push(function () {
		    return am5.Bullet.new(root, {
		      locationY: 0.5,
		      sprite: am5.Label.new(root, {
		        text: "{valueY}",
		        fontSize:10,
		        // fill: root.interfaceColors.get("alternativeText"),
		        fill: "#f59c1a",
		        centerY: am5.p50,
		        centerX: am5.p50,
		        populateText: true
		      })
		    });
		  });

		  // Set data
		  xAxis.data.setAll(results);
		  series.data.setAll(results);

		  series.appear(1000);
		  chart.appear(1000, 100);
	  
	  });
	}

	function _generate_line(results,komp){
		"use strict";
		am5.ready(function() {
		  var root = am5.Root.new(komp);
		  root.setThemes([
		    am5themes_Animated.new(root)
		  ]);

		  var chart = root.container.children.push(am5xy.XYChart.new(root, {
				  panX: true,
				  panY: true,
				  wheelX: "panX",
				  wheelY: "zoomX",
				  layout: root.verticalLayout,
				  pinchZoomX:true
				}));

		  var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
			  behavior: "none"
			}));
			cursor.lineY.set("visible", false);

		  var colorSet = am5.ColorSet.new(root, {});
		// Create axes
		// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
		var xRenderer = am5xy.AxisRendererX.new(root, {});
		xRenderer.grid.template.set("location", 0.5);
		xRenderer.labels.template.setAll({
		  location: 0.5,
		  multiLocation: 0.5
		});

		var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
		  categoryField: "unit",
		  renderer: xRenderer,
		  tooltip: am5.Tooltip.new(root, {})
		}));

		xAxis.data.setAll(results);

		var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
		  maxPrecision: 0,
		  renderer: am5xy.AxisRendererY.new(root, {})
		}));

		var series = chart.series.push(am5xy.LineSeries.new(root, {
		  xAxis: xAxis,
		  yAxis: yAxis,
		  valueYField: "value",
		  categoryXField: "unit",
		  tooltip: am5.Tooltip.new(root, {
		    labelText: "{valueY}",
		    dy:-5
		  })
		}));

		series.bullets.push(function () {
		    return am5.Bullet.new(root, {
		      locationY: 0.5,
		      sprite: am5.Label.new(root, {
		        text: "{valueY}",
		        fontSize:10,
		        // fill: root.interfaceColors.get("alternativeText"),
		        fill: "#f59c1a",
		        centerY: am5.p50,
		        centerX: am5.p50,
		        populateText: true
		      })
		    });
		  });

		series.strokes.template.setAll({
		  templateField: "strokeSettings",
		  strokeWidth: 2
		});

		series.fills.template.setAll({
		  visible: true,
		  fillOpacity: 0.5,
		  templateField: "fillSettings"
		});


		series.bullets.push(function() {
		  return am5.Bullet.new(root, {
		    sprite: am5.Circle.new(root, {
		      templateField: "bulletSettings",
		      radius: 5
		    })
		  });
		});

		series.data.setAll(results);
		series.appear(1000);

		// Add scrollbar
		// https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
		chart.set("scrollbarX", am5.Scrollbar.new(root, {
		  orientation: "horizontal",
		  marginBottom: 20
		}));

		// Make stuff animate on load
		// https://www.amcharts.com/docs/v5/concepts/animations/
		chart.appear(1000, 100);

	  
	  });
	}

	var Dashboard = function () {
	    "use strict";
	    return {
	        init: function () {
	            handleTotalCard();
	            handleDonutChart();
	            handleTotalPenjualan();
	            handleLastTransaction();
	            handleSalesByBulan();
	            handleSalesBykategori();
	            handleSalesLineByBulan();
	        }
	    }
	}()
</script>