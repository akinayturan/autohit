<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-hand-peace-o font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Surf Time</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <p>Next site in 2 seconds.</p>
                <hr />
                <p>You will earn 0.8 credits by visiting this site.</p>
                <p>Current Site</p>
                <p>List of recently visited sites</p>
                <table>
                    <tr>
                        <td>
                            <input type='hidden' id='currentk' value='0' >
                            <input type='hidden' id='cwindow' value='0' >
                            <label>Site: http://www.</label></td>
                        <td colspan='2'><input type='text' name='domain' id='domain' value='baykusgrup.com' ></td>
                        <td><input type='button' value='Başlat!' name='submit' onclick="beginu();" ></td>
                    </tr>
                    <tr>
                        <td colspan='4'>
                            <p>
                                <b>Durum:</b> <span id='statusk'></span>
                                <br />
                                <b>Toplam Kazanılan Link Sayısı:</b><span id='totalbl'></span>
                            </p>
                        </td>
                    </tr>
                </table>
                <a role="button" onclick="beginu()" class="btn blue btn-block">Start Viewer</a>
                <br />
                <table class="table table-hover table-striped table-bordered">
                    <tbody>

                    <tr>
                        <td>Auto Distribution</td>

                        <td>
                            <label class="mt-checkbox mt-checkbox-outline">
                                No
                                <input type="checkbox" value="1" name="test"/>
                                <span></span>
                            </label>
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="
When enabled, this option allows you to automatically distribute the credits earned through the viewer to your active sites. To accumulate credits in your bank you should disable this option. This option do not have any impact on credits purchased or already in the bank. ">
                            <span class="badge badge-primary badge-roundless"> ? </span>

                        </td>
                    </tr>
                    <tr>
                        <td> Light Viewer Link</td>
                        <td>
                            sss
                        </td>
                        <td width="20px" class="tooltips" data-container="body" data-placement="bottom"
                            data-original-title="tooltips">
                            <span class="badge badge-primary badge-roundless"> ? </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <p class="font-red-intense">Multiple Viewers </p>
                <p>
                    To use Multiple Viewers, each viewers must have their own IP adresse. In order to have Multiple IPs you can use VPS.
                </p>

                <p class="font-red-intense">Active Viewers </p>
                <table class="table table-hover table-striped table-bordered">
                    <tbody>
                    <tr>
                        <th>
                            IP Address
                        </th>
                        <th>
                            Delay
                        </th>
                        <th>
                            Last Url
                        </th>
                    </tr>
                    <tr>
                        <td>88.241.39.87 <br> TURKEY</td>
                        <td>
                            9 sec
                        </td>
                        <td>
                            http://www.hamilton-radio.com <br>
                            Type: Classic Windows Chrome 55.0.2883.87
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-hover table-striped table-bordered">
                    <tbody id="sites_urls">


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    var myWindow;

    maxsub=10;

    function getUrlsFromDatabase() {
        $.ajax({
            type: "POST",
            url: base_url + "/index.php/Earn/getUrlsFromDatabase",
            cache: false,
            success: function (result) {
                document.getElementById("sites_urls").innerHTML=result;
                geturl();
            }
        });
    }

    function geturl(){

        var theurls=new Array();
        var sites_selector = document.getElementsByName("sites_selector");
        for (var i=0; i<sites_selector.length; i++){
            theurls.push(sites_selector[i].innerText);
        }

        maxsub=sites_selector.length;

        current1 = parseInt(document.getElementById("currentk").value);

        if (!myWindow) {
            document.getElementById("msg").innerHTML = "Window has never been opened!";
        } else {
            if (myWindow.closed) {
                document.getElementById("statusk").innerHTML="Sonlandı...";
            } else {
                currentk2=parseInt(document.getElementById("currentk").value)+1;
                document.getElementById("totalbl").innerHTML=currentk2;
                document.getElementById("statusk").innerHTML="Çalışıyor...";
                document.getElementById("currentk").value= currentk2;
                url = theurls[current1];
                window.open(url,"myWindow");
                timerId = setTimeout(geturl, 2000);
            }
        }

    }

    function beginu(){
        cdomain=document.getElementById("domain").value;
        cdomain=cdomain.replace("http://", "");
        cdomain=cdomain.replace("www.", "");
        myWindow = window.open("", "myWindow");
        getUrlsFromDatabase();
    }

    function getFlashMovieObject(movieName)
    {
        if (window.document[movieName])
        {
            return window.document[movieName];
            alert(movieName);
        }
        if (navigator.appName.indexOf("Microsoft Internet")==-1)
        {
            if (document.embeds && document.embeds[movieName])
                return document.embeds[movieName];
        }
        else
        {
            return document.getElementById(movieName);
        }
    }

    function SendDataToFlashMovie(fgh,tr)
    {
        var flashMovie=getFlashMovieObject("predoll");
        flashMovie.changetop(fgh,tr);
        using(fgh,tr);
    }

    function GetXmlHttpObject()
    {
        var xmlHttp=null;
        try
        {
            // Firefox, Opera 8.0+, Safari
            xmlHttp=new XMLHttpRequest();
        }
        catch (e)
        {
            // Internet explorer
            try
            {
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e)
            {
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlHttp;
    }

    function stateChanged()
    {
        if (xmlHttp.readyState==3)
        {
            tid=xmlHttp.responseText;
            alert(tid);
        }
    }



</script>
