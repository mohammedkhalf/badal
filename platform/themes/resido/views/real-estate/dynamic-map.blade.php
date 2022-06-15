
<?php
//$page = isset($_GET['page']) ? $_GET['page'] : "dynamic-map.php";
//if( file_exists($page)) include($page);
//else include("404.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://sahla-ad.com/dynamic-map/style.css">
</head>

<body>
<div class="container">
 <div class="row">
      <div class="col-12 mb-3">
            <select id="main_select" class="form-control">
                <option selected>Choose</option>
                <option value="map1">map 1</option>
                <option value="map2">map 2</option>
                <option value="map3">map 3</option>
             </select>
      </div>
      <!--<div id="details-data">-->
      <!--      <div class="data-section map1" id="map1">-->
      <!--          details data 1-->
      <!--      </div>-->
      <!--      <div class="data-section map2" id="map2">-->
      <!--          details data 2-->
      <!--      </div>-->
      <!--      <div class="data-section map3" id="map3">-->
      <!--          details data 3-->
      <!--      </div>-->
      <!--  </div>-->
                            
                            
       <div class="col-12">
            <h4>أختار مخطط التوزيع</h4>
            <div class="form-group">
                <select class="form-control bg-white" id="sub_select" name="replacement">
                  <option selected>Choose</option>
                  <option class="map1" value="sub1"> sub 1 </option>
                  <option class="map2" value="sub2"> sub 2 </option>
                </select>
            </div>
        </div>
        
        <div class="col-12">
            <h4>أختار التوزيعة</h4>
            <div class="form-group">
                <select class="form-control bg-white" id="sub_select1" name="replacement">
                    <option selected>Choose</option>
                     <option class="sub1" value="subsub1"> sub sub1 </option>
                     <option class="sub2" value="subsub1"> sub sub2 </option>
                </select>
            </div>
        </div>
    	
    	<div class="col-12">
    	<p> 137 قسيمة - قطعة 1
    	  مساحة القسيمة 400م2
    	</p>
        </div>
    </div>
    </div>
  <div class="container">
        <div class="location-map" id="details-data">
     <div class="data-section map1" id="map1">
        <img src="{{url('/storage/map.png')}}" usemap="#image-map" class="map" >
        <map name="image-map">
        <area target="" coords="757,164,814,222" shape="rect" class="area-element" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}'>
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="757,226,814,283" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="757,286,814,344" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="757,635,814,689" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="757,345,814,403" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="757,406,814,464" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="757,511,814,569" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="757,573,814,630" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="757,696,814,751" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="898,196,975,244" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="898,248,975,296" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="898,313,975,358" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="898,364,972,412" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="898,413,972,461" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="898,498,975,546" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="898,550,975,595" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="898,600,972,645" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="975,196,1049,244" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="975,246,1049,294" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="975,314,1049,359" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="975,366,1052,411" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="975,413,1052,461" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="978,499,1052,547" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="978,552,1049,597" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="975,599,1052,644" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="907,827,847,769" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="911,771,968,825" shape="rect" class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="968,770,1029,827" shape="rect"  class="area-element">
        <area target="" alt="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' title="" href="" coords="1032,771,1090,829" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1090,770,1154,827" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1154,769,1215,827" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1218,769,1276,827" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1138,197,1212,248" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1138,250,1212,295" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1138,314,1212,362" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1138,365,1212,410" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1138,414,1212,459" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1138,500,1212,545" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1138,553,1212,598" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1138,601,1212,646" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1218,197,1289,245" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1218,246,1289,294" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1215,314,1289,362" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1215,367,1289,409" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1215,412,1289,460" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1215,498,1289,549" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1215,552,1289,596" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1212,596,1289,647" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1392,187,1449,245" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1453,187,1513,245" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1513,187,1574,244" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1578,185,1635,246" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1635,187,1696,248" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1699,185,1760,246" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1392,245,1449,305" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1453,248,1510,306" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1514,248,1575,306" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1578,246,1635,304" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1639,249,1696,304" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1699,251,1757,305" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1372,400,1427,473" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1430,400,1481,474" shape="rect" class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1485,400,1536,473" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1539,401,1590,475" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1622,400,1674,473" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1677,402,1728,473" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1731,401,1783,475" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1372,500,1427,577" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1430,500,1481,577" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1485,500,1539,577" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1590,578,1539,498" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1622,499,1674,573" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1674,501,1728,575" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1731,499,1783,575" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1869,151,1930,208" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1869,212,1930,269" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1869,271,1930,332" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1869,336,1930,391" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1869,395,1930,453" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1930,151,1991,208" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1933,208,1991,269" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1933,270,1991,334" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1933,335,1991,390" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1933,395,1991,453" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1869,484,1930,545" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1930,485,1991,546" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1869,546,1930,604" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1930,546,1991,604" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1869,605,1930,663" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1933,606,1991,664" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2074,214,2132,275" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2136,214,2193,275" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2075,278,2132,336" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2193,337,2136,279" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2071,340,2132,394" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2136,337,2196,395" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2075,398,2132,459" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2132,402,2193,457" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2075,480,2132,541" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2136,481,2193,539" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2071,544,2132,602" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2136,542,2193,600" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2071,605,2132,660" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2136,604,2193,661" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1879,768,1956,816" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1956,765,2033,816" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2036,770,2110,815" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2110,766,2184,814" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1369,1014,1427,1069" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1369,1074,1427,1128" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1366,1134,1427,1192" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1366,1195,1427,1250" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1430,1010,1491,1068" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1430,1072,1488,1133" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1427,1136,1488,1190" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1430,1197,1488,1255" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1590,981,1648,1039" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1648,981,1709,1038" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1709,982,1770,1040" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1773,982,1834,1040" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1837,979,1895,1040" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1921,982,1982,1040" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1985,982,2046,1040" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2107,1040,2046,982" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="2110,982,2168,1040" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1590,1148,1651,1206" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1655,1149,1712,1207" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1715,1147,1776,1208" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1776,1147,1837,1208" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1837,1149,1898,1209" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1901,1147,1956,1208" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1590,1209,1648,1270" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1651,1210,1712,1271" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1715,1213,1773,1270" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1773,1208,1837,1269" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1837,1210,1898,1270" shape="rect"  class="area-element">
        <area target="" alt="" title="" data-maphilight='{"strokeColor":"44da06","strokeWidth":5,"fillColor":"44da06","fillOpacity":0.8}' href="" coords="1901,1213,1959,1270" shape="rect"  class="area-element">
        </map>
     </div>
      <div class="data-section map2" id="map2">
        details data 2
     </div>
</div>
  </div>
    <script>
        $(document).ready(function(){
            $('#main_select').change(function(){
                $('.data-section').hide();
                $('#' + $(this).val()).show();
            });
        })
        $(document).ready(function(){
            document.getElementById("main_select").onchange = function () {
              let selector = document.getElementById("main_select");
              let value = selector[selector.selectedIndex].value;
              

              let nodeList = document
                .getElementById("sub_select")
                .querySelectorAll("option");

            
              nodeList.forEach(function (option) {
                if (option.classList.contains(value)) {
                  option.style.display = "block";
                } else {
                  option.style.display = "none";
                }
              });
            };
        });
         $(document).ready(function(){
            document.getElementById("sub_select").onchange = function () {
              let selector2 = document.getElementById("sub_select");
              let value2 = selector2[selector2.selectedIndex].value;
            
              let nodeList1 = document
                .getElementById("sub_select1")
                .querySelectorAll("option");
            
              nodeList1.forEach(function (option) {
                if (option.classList.contains(value2)) {
                  option.style.display = "block";
                } else {
                  option.style.display = "none";
                }
              });
            };
         });
 

    </script>


</body>
</html>
