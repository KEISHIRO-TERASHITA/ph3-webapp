<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>webapp</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('/js/webapp.js') }}" defer></script>
  </head>
  <body>
    <header>
      <div>
        <img alt="posseロゴ" src="{{asset('/img/header-logo.png')}}" />
        <p>4th week</p>
      </div>
      <button onclick="showModal()">記録・投稿</button>
    </header>

    <div id="chartArea">
      <div id="columnChartArea">
        <div id="data">
          <div class="datum" id="study_today">
            <p class="dataTitle">Today</p>
            <p class="data_hour">{{$today_hours}}</p>
            <p class="hour">hour</p>
          </div>
          <div class="datum" id="study_month">
            <p class="dataTitle">Month</p>
            <p class="data_hour">{{$month_hours}}</p>
            <p class="hour">hour</p>
          </div>
          <div class="datum" id="study_total">
            <p class="dataTitle">Total</p>
            <p class="data_hour">{{$hours}}</p>
            <p class="hour">hour</p>
          </div>
        </div>
        <div class="chartContainer">
          <canvas id="columnChart"></canvas>
        </div>
      </div>
      <div id="pieChartArea">
        <div class="chartContainer" id="container_pieChart_language">
          <p class="pieChartTitle">学習言語</p>
          <canvas id="pieChart_language"></canvas>
          <div class="pieChartElementsArea">
            @foreach ($languages as $language)
              <div class="pieChartElements">{{$language->language}}</div>
            @endforeach
          </div>
        </div>
        <div class="chartContainer" id="container_pieChart_contents">
          <p class="pieChartTitle">学習コンテンツ</p>
          <canvas id="pieChart_contents"></canvas>
          <div class="pieChartElementsArea">
            @foreach($contents as $content)
              <div class="pieChartElements">{{$content->content}}</div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="month">
      <p>{{date('Y')}}年 {{date('m')}}月</p>
    </div>

    <button onclick="showModal()" id = "button_sp" class="button">記録・投稿</button>

    <!-- モーダル -->
    <div id="modal">
      <div id="modalContent">
        <section id = "modalClose">&times;</section>
        <div id="formRapper">
          <div id="form_1">
            <p>学習日</p>
            <input type="text" id="date" class = "text" onclick="showCalendar()"/>
            <p>学習コンテンツ（複数選択可）</p>
            <div class="checkboxRapper">
              <div class="checkbox">
                <input type="checkbox" id="N" value="N" name="contents" />
                <label for="N">N予備校</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="dotInstall" value="dotInstall" name="contents"/>
                <label for="dotInstall">ドットインストール</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="POSSE" value="POSSE" name="contents"/>
                <label for="POSSE">POSSE課題</label>
              </div>
            </div>

            <p>学習言語（複数選択可）</p>
            <div class="checkboxRapper">
              <div class="checkbox">
                <input type="checkbox" id="html" name="language" />
                <label for="html">HTML</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="css" name="language" />
                <label for="css">CSS</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="js" name="language" />
                <label for="js">JavaScript</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="php" name="language" />
                <label for="php">PHP</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="laravel" name="language" />
                <label for="laravel">Laravel</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="SQL" name="language" />
                <label for="SQL">SQL</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="SHELL" name="language" />
                <label for="SHELL">SHELL</label>
              </div>
  
              <div class="checkbox">
                <input type="checkbox" id="others" name="language"/>
                <label for="others">情報システム基礎知識（その他）</label>
            </div>
            </div>
          </div>

          <div id="form_2">
            <p>学習時間</p>
            <input type="text" id="learningTime" class = "text" />
            <p>ツイッター用コメント</p>
            <input type="textarea" name="twitterMessage" id="twitterMessage" class = "textarea" />
            <br />
            <div class="shareButton">
              <input type="checkbox" id = "share" />
              <label for="share">twitterにシェアする</label>
            </div>
          </div>
        </div>
        
        <a href="" target="blank" id="link_share">
          <button class="button" id = "submitButton">記録・投稿</button>
        </a>
      </div>
    </div>

    <div id="calendarBackGround">
      <div id="calendarRapper">
        <div class="month">
          <section class="prev" onclick = "prev()"></section>
          <p id = "calendarHead" onclick = "showDate()"></p>
          <section class="next" onclick = "next()"></section>
        </div>
        <div id="calendarArea"></div>
        <button class="button" onclick="getValueOfDate()">決定</button>
      </div>
    </div>

    @include('/webApp/chartScript')
  </body>
</html>
