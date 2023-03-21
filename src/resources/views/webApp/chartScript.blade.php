<?php

use JetBrains\PhpStorm\Language;

$last_day = date('t');

$labels = [];
for ($i = 1; $i <= $last_day; $i++) {
  array_push($labels, (string)$i);
}

$data = [];
function num_to_str(int $num)
{
  if ($num < 10) {
    $str = '0' . (string)$num;
  } else {
    $str = (string)$num;
  }
  return $str;
}
for ($i = 1; $i <= $last_day; $i++) {
  foreach ($month_studies as $study) {
    $hour = $study->searchData(num_to_str($i));
    if ($hour !== 0) {
      break;
    }
  }
  array_push($data, $hour);
}

$languages_label = [];
$contents_label = [];
$language_data = [];
$contents_data = [];
foreach ($languages as $language) {
  array_push($languages_label, $language->language);
  array_push($language_data, 0);
}
foreach ($contents as $content) {
  array_push($contents_label, $content->content);
  array_push($contents_data, 0);
}

foreach ($studies as $study) 
{
  foreach ($study->languages as $datum) 
  {
    foreach ($languages as $index => $language) 
    {
      if ($datum->language === $language->language) 
      {
        $language_data[$index] += ($study->hours / $study->languages->count());
      }
    }
  }

  foreach ($study->contents as $datum) 
  {
    foreach ($contents as $index => $content) 
    {
      if ($datum->content === $content->content) 
      {
        $contents_data[$index] += ($study->hours / $study->contents->count());
      }
    }
  }
}

function int($num)
{
  return intval($num);
}
$language_data = array_map('int', $language_data);
$contents_data = array_map('int', $contents_data);
?>

<script>
  // phpからデータをもらう
  const studies = @JSON($studies);
  const languages = @JSON($languages);
  const contents = @JSON($contents);
  const lastDay = @JSON($last_day);
  // 棒グラフ
  const columnChartArea = document.getElementById('columnChart');
  new Chart(columnChartArea, {
    type: 'bar',
    data: {
      labels: @JSON($labels),
      datasets: [{
        data: @JSON($data),
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false,
        }
      },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // ドーナツチャート
  const languageChartArea = document.getElementById("pieChart_language");
  new Chart(languageChartArea, {
    type: 'doughnut',
    data: {
      labels: @JSON($languages_label),
      datasets: [{
        data: @JSON($language_data),
        backgroundColor: [
          '#0445ec',
          '#0f70bd',
          '#20bdde',
          '#3ccefe',
          '#b29ef3',
          '#6c46eb',
          '#4a17ef',
          '#3005c0',
          '#0445ec',
          '#0f70bd',
          '#20bdde'
        ],
      }],
    },
    options: {
      plugins: {
        legend: {
          display: false,
        },
      },
    }
  })

  const contentChartArea = document.getElementById("pieChart_contents");
  new Chart(contentChartArea, {
    type: 'doughnut',
    data: {
      labels: @JSON($contents_label),
      datasets: [{
        data: @JSON($contents_data),
        backgroundColor: [
          '#0445ec',
          '#0f70bd',
          '#20bdde',
          '#3ccefe',
          '#b29ef3',
          '#6c46eb',
          '#4a17ef',
          '#3005c0',
          '#0445ec',
          '#0f70bd',
          '#20bdde'
        ],
      }],
    },
    options: {
      plugins: {
        legend: {
          display: false,
        },
      },
    }
  })
</script>