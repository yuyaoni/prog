
　　 //課題３
    //****************************************
    //成功関数
    //****************************************
    let map;

    function mapsInit(position) {
        //lat=緯度、lon=経度 を取得
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        map = new Microsoft.Maps.Map('#myMap', {});

        Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
            var directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
            // Set Route Mode to driving
            directionsManager.setRequestOptions({ routeMode: Microsoft.Maps.Directions.RouteMode.driving });
            var waypoint1 = new Microsoft.Maps.Directions.Waypoint({ address: '現在地', location: new Microsoft.Maps.Location(lat, lon) });
            var waypoint2 = new Microsoft.Maps.Directions.Waypoint({ address: 'チーズアカデミー', location: new Microsoft.Maps.Location(35.6693318, 139.7008082) });
            directionsManager.addWaypoint(waypoint1);
            directionsManager.addWaypoint(waypoint2);
            // Set the element in which the itinerary will be rendered
            directionsManager.setRenderOptions({ itineraryContainer: document.getElementById('printoutPanel') });
            directionsManager.calculateDirections();
        });
    

    };

    //****************************************
    //失敗関数
    //****************************************
    function mapsError(error) {
      let e = "";
      if (error.code == 1) { //1＝位置情報取得が許可されてない（ブラウザの設定）
        e = "位置情報が許可されてません";
      }
      if (error.code == 2) { //2＝現在地を特定できない
        e = "現在位置を特定できません";
      }
      if (error.code == 3) { //3＝位置情報を取得する前にタイムアウトになった場合
        e = "位置情報を取得する前にタイムアウトになりました";
      }
      alert("エラー：" + e);
    };

    //****************************************
    //オプション設定
    //****************************************
    const set = {
      enableHighAccuracy: true, //より高精度な位置を求める
      maximumAge: 20000, //最後の現在地情報取得が20秒以内であればその情報を再利用する設定
      timeout: 10000 //10秒以内に現在地情報を取得できなければ、処理を終了
    };


    //最初に実行する関数
    function GetMap() {
      navigator.geolocation.getCurrentPosition(mapsInit, mapsError, set);
    }


//ここまで課題３

  //firebaseのデーターベース（保存させる場所）を使う
  const newPostRef = firebase.database().ref();

  // 送信ボタンをクリックされたら次の処理をする
  $("#send").on("click", function () {

    let userNameValue = $("#username").val();

    if(userNameValue ==""){
      alert("値が入力されていません");
      return;
    }

    newPostRef.push({
    username:$("#username").val(),
    reason: $("#reason").val(),
    username_kana: $("#username_kana").val(),
    email: $("#email").val(),
    kigyou: document.getElementById("kigyou").checked,  //チェックボックスの情報
    textarea: $("#textarea").val()
    })
    
    $("#username").val("");
    $("#reason").val("");
    $("#username_kana").val("");
    $("#email").val("");
    $("#kigyou").val("");
    $("#textarea").val("");

  });

  var command = [65, 68, 77, 73, 78];
  var length = command.length;
  var index = 0;

  $("#textarea").on("keydown", function (e) {

    // textarea欄に"admin"と入力された場合のみこれまでの入力データを表示する
    if(e.keyCode === command[index])
    {
        index++;
        if (index >= length) {
            index = 0;
            // 受信処理
            newPostRef.on("child_added", function (data) {
                let v = data.val();
                let str = `<p>${v.username} ${v.username_kana} ${v.reason} ${v.email} ${v.kigyou} ${v.textarea}<p>`;
                $("#output").prepend(str);
                })
            alert(data);
          }              
    }else{
        index = 0;
    }
  })
// ここまで課題３

//課題２追記箇所
$("#btn_wc").on("click",function(){
    var today = new Date();
    const order = "ウォッシュチーズ";
    localStorage.setItem(today, order);
    const html = `
    <tr>
        <th>${today}</th>
        <td>${order}</td>
    </tr>
    `
    $("#cart_list").append(html);
});

$("#btn_sc").on("click",function(){
    var today = new Date();
    const order = "シェーブルチーズ";
    localStorage.setItem(today, order);
    const html = `
    <tr>
        <th>${today}</th>
        <td>${order}</td>
    </tr>
    `
    $("#cart_list").append(html);
});

$("#btn_fc").on("click",function(){
    var today = new Date();
    const order = "フレッシュチーズ";
    localStorage.setItem(today, order);
    const html = `
    <tr>
        <th>${today}</th>
        <td>${order}</td>
    </tr>
    `
    $("#cart_list").append(html);
});

//ページ読み込み：保存データ取得表示
for(let i=0; i<localStorage.length; i++){
    const today   = localStorage.key(i);
    const order = localStorage.getItem(today);

    const html = `
    <tr>
        <th>${today}</th>
        <td>${order}</td>
    </tr>
    `
    $("#cart_list").append(html);
}

$("#btn_clear").on("click",function(){
    localStorage.clear();
    $("#cart_list").empty();
});


//ここまで課題２

//課題１追記箇所

//日替わりメニューA
$("#btn_a").on("click",function(){
    var menu_a = Math.floor(Math.random()*3);

    if(menu_a == 0)
    {
        // 5種のチーズフォンデュクワトロ
        window.open('https://www.dominos.jp/menu-pizza/1891', '_blank');
    }
    else if(menu_a == 1)
    {
        // 3種チーズのベジフォンデュ
        window.open('https://www.dominos.jp/menu-pizza/1887', '_blank');
    }
    else if(menu_a == 2)
    {
        // 3種のとろけるチーズフォンデュ
        window.open('https://www.dominos.jp/menu-pizza/1891', '_blank');
    }
});

//日替わりメニューB
$("#btn_b").on("click",function(){
    var menu_b = Math.floor(Math.random()*3);

    if(menu_b == 0)
    {
        // クワトロ・ニューヨーカー
        window.open('https://www.dominos.jp/menu-pizza/1085', '_blank');
    }
    else if(menu_b == 1)
    {
        // ビッグ ぺパロニ
        window.open('https://www.dominos.jp/menu-pizza/1081', '_blank');
    }
    else if(menu_b == 2)
    {
        // ビッグ チーズ
        window.open('https://www.dominos.jp/menu-pizza/1082', '_blank');
    }
});

//日替わりメニューC
$("#btn_c").on("click",function(){
    var menu_c = Math.floor(Math.random()*3);

    if(menu_c == 0)
    {
        // クワトロ・ミートマックス
        window.open('https://www.dominos.jp/menu-pizza/1050', '_blank');
    }
    else if(menu_c == 1)
    {
        // 炭火焼ビーフ
        window.open('https://www.dominos.jp/menu-pizza/1622', '_blank');
    }
    else if(menu_c == 2)
    {
        // ハズレ
        window.open('https://calligra.design/2018/09/06/c0033_8/', '_blank');
    }
});

//ここまで課題１
