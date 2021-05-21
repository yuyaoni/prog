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
