<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投票結果</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        #myChart {
            display: none; /* 初期状態は非表示 */
        }
    </style>
</head>
<body>
    <h1>投票結果</h1>

    <!-- ボタンの作成 -->
    <button onclick="showTotal()">総数グラフ</button>
    <button onclick="showLocation()">地域別グラフ</button>
    <button onclick="showAge()">年代別グラフ</button>
    <button onclick="showGender()">男女別グラフ</button>
    <button onclick="showMaleGraph()">男性・年代別グラフ</button>
    <button onclick="showFemaleGraph()">女性・年代別グラフ</button>
    


    <h2>地域・年代別グラフ</h2>
    <div id="locationButtons">
        @foreach($locationAgeStatistics as $location => $ageData)
            <button onclick="showLocationAge('{{ $location }}')">{{ $location }}のグラフ</button>
        @endforeach
    </div>

    <canvas id="myChart" width="400" height="200"></canvas>

    <script>
        const genderAgeStatistics = @json($genderAgeStatistics); // ここでデータをJavaScriptに渡す
        let myChart;

        function showTotal() {
            const ctx = document.getElementById('myChart').getContext('2d');
            const labels = ['肯定', '否定'];
            const data = [{{ $totalStatistics['肯定'] }}, {{ $totalStatistics['否定'] }}];

            if (myChart) myChart.destroy(); // 既存のグラフを破棄

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '投票数',
                        data: data,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            document.getElementById('myChart').style.display = 'block'; // グラフを表示
        }

        function showLocation() {
            const ctx = document.getElementById('myChart').getContext('2d');
            const labels = {!! json_encode(array_keys($locationStatistics)) !!}; // 地域名
            const positiveVotes = {!! json_encode(array_column($locationStatistics, '肯定')) !!}; // 肯定数
            const negativeVotes = {!! json_encode(array_column($locationStatistics, '否定')) !!}; // 否定数

            if (myChart) myChart.destroy();

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '肯定',
                        data: positiveVotes,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: '否定',
                        data: negativeVotes,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            document.getElementById('myChart').style.display = 'block'; // グラフを表示
        }

        function showAge() {
            const ctx = document.getElementById('myChart').getContext('2d');

            // 年齢をカテゴリにマッピングする関数
            function getAgeCategory(age) {
                if (age >=  0 && age < 10) return '0~9才';
                if (age >= 10 && age < 20) return '10代';
                if (age >= 20 && age < 30) return '20代';
                if (age >= 30 && age < 40) return '30代';
                if (age >= 40 && age < 50) return '40代';
                if (age >= 50 && age < 60) return '50代';
                if (age >= 60) return '60代以上';
                return '未指定';
            }

            // 年齢データを取得し、カテゴリ別に集計
            const ageStats = {!! json_encode($ageStatistics) !!};
            const categories = {};

            Object.keys(ageStats).forEach(age => {
                const category = getAgeCategory(parseInt(age));
                if (!categories[category]) {
                    categories[category] = { 肯定: 0, 否定: 0 };
                }
                categories[category].肯定 += ageStats[age]['肯定'];
                categories[category].否定 += ageStats[age]['否定'];
            });

            // カテゴリ名と投票データを準備
            const ageLabels = Object.keys(categories);
            const positiveVotes = ageLabels.map(category => categories[category].肯定);
            const negativeVotes = ageLabels.map(category => categories[category].否定);

            if (myChart) myChart.destroy();

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    datasets: [{
                        label: '肯定',
                        data: positiveVotes,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                        },
                    }, {
                        label: '否定',
                        data: negativeVotes.map(vote => -vote), // 否定は負の値に
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        datalabels: {
                            anchor: 'start',
                            align: 'start',
                        },
                    }]
                },
                options: {
                    indexAxis: 'y', // Y軸を年齢カテゴリに設定
                    scales: {
                        x: {
                            beginAtZero: true,
                            min: -Math.max(...negativeVotes),
                            max: Math.max(...positiveVotes),
                            title: {
                                display: true,
                                text: '投票数'
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: '年齢カテゴリ'
                            },
                            reverse: true // Y軸を反転させて若い順にする
                        }
                    },
                    plugins: {
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            formatter: (value) => Math.abs(value),
                        }
                    }
                }
            });

            document.getElementById('myChart').style.display = 'block';
        }







        function showGender() {
            const ctx = document.getElementById('myChart').getContext('2d');
            const labels = ['男性', '女性'];
            const positiveVotes = [{{ $genderStatistics['male']['肯定'] }}, {{ $genderStatistics['female']['肯定'] }}];
            const negativeVotes = [{{ $genderStatistics['male']['否定'] }}, {{ $genderStatistics['female']['否定'] }}];

            if (myChart) myChart.destroy();

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: '肯定',
                        data: positiveVotes,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }, {
                        label: '否定',
                        data: negativeVotes,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            document.getElementById('myChart').style.display = 'block';
        }

        function showMaleGraph() {
            const ctx = document.getElementById('myChart').getContext('2d');

            // 年齢をカテゴリにマッピングする関数
            function getAgeCategory(age) {
                if (age >=  0 && age < 10) return '0~9才';
                if (age >= 10 && age < 20) return '10代';
                if (age >= 20 && age < 30) return '20代';
                if (age >= 30 && age < 40) return '30代';
                if (age >= 40 && age < 50) return '40代';
                if (age >= 50 && age < 60) return '50代';
                if (age >= 60) return '60代以上';
                return '未指定';
            }

            // 男性データを年齢カテゴリに基づいて集計
            const categories = {};
            Object.keys(genderAgeStatistics).forEach(age => {
                const category = getAgeCategory(parseInt(age));
                if (!categories[category]) {
                    categories[category] = { 肯定: 0, 否定: 0 };
                }
                categories[category].肯定 += genderAgeStatistics[age]['male']['肯定'] || 0;
                categories[category].否定 += genderAgeStatistics[age]['male']['否定'] || 0;
            });

            // カテゴリ名と投票データを準備
            const ageLabels = Object.keys(categories);
            const positiveVotes = ageLabels.map(category => categories[category].肯定);
            const negativeVotes = ageLabels.map(category => categories[category].否定);

            if (myChart) myChart.destroy();

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    datasets: [
                        {
                            label: '男性 - 肯定',
                            data: positiveVotes,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                        },
                        {
                            label: '男性 - 否定',
                            data: negativeVotes.map(vote => -vote), // 否定票は逆方向
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                        }
                    ]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                        },
                        y: {
                            title: {
                                display: true,
                                text: '年齢',
                            },
                            reverse: true // 年齢を若い順に表示
                        }
                    }
                }
            });

            document.getElementById('myChart').style.display = 'block'; // グラフを表示
        }

        function showFemaleGraph() {
            const ctx = document.getElementById('myChart').getContext('2d');

            // 年齢をカテゴリにマッピングする関数
            function getAgeCategory(age) {
                if (age >=  0 && age < 10) return '0~9才';
                if (age >= 10 && age < 20) return '10代';
                if (age >= 20 && age < 30) return '20代';
                if (age >= 30 && age < 40) return '30代';
                if (age >= 40 && age < 50) return '40代';
                if (age >= 50 && age < 60) return '50代';
                if (age >= 60) return '60代以上';
                return '未指定';
            }

            // 女性データを年齢カテゴリに基づいて集計
            const categories = {};
            Object.keys(genderAgeStatistics).forEach(age => {
                const category = getAgeCategory(parseInt(age));
                if (!categories[category]) {
                    categories[category] = { 肯定: 0, 否定: 0 };
                }
                categories[category].肯定 += genderAgeStatistics[age]['female']['肯定'] || 0;
                categories[category].否定 += genderAgeStatistics[age]['female']['否定'] || 0;
            });

            // カテゴリ名と投票データを準備
            const ageLabels = Object.keys(categories);
            const positiveVotes = ageLabels.map(category => categories[category].肯定);
            const negativeVotes = ageLabels.map(category => categories[category].否定);

            if (myChart) myChart.destroy();

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    datasets: [
                        {
                            label: '女性 - 肯定',
                            data: positiveVotes,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1,
                        },
                        {
                            label: '女性 - 否定',
                            data: negativeVotes.map(vote => -vote), // 否定票は逆方向
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1,
                        }
                    ]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                        },
                        y: {
                            title: {
                                display: true,
                                text: '年齢',
                            },
                            reverse: true // 年齢を若い順に表示
                        }
                    }
                }
            });

            document.getElementById('myChart').style.display = 'block'; // グラフを表示
        }




        function showLocationAge(location) {
            const ctx = document.getElementById('myChart').getContext('2d');

            // 年齢をカテゴリにマッピングする関数
            function getAgeCategory(age) {
                if (age >=  0 && age < 10) return '0~9才';
                if (age >= 10 && age < 20) return '10代';
                if (age >= 20 && age < 30) return '20代';
                if (age >= 30 && age < 40) return '30代';
                if (age >= 40 && age < 50) return '40代';
                if (age >= 50 && age < 60) return '50代';
                if (age >= 60) return '60代以上';
                return '未指定';
            }

            // 地域別年齢データを取得
            const locationData = {!! json_encode($locationAgeStatistics) !!}[location];

            if (!locationData) {
                console.error(`地域 ${location} のデータが存在しません。`);
                return; // データが存在しない場合は処理を終了
            }

            const categories = {};
            Object.keys(locationData).forEach(age => {
                const category = getAgeCategory(parseInt(age));
                if (!categories[category]) {
                    categories[category] = { 肯定: 0, 否定: 0 };
                }
                categories[category].肯定 += locationData[age]['肯定'];
                categories[category].否定 += locationData[age]['否定'];
            });

            // カテゴリ名と投票データを準備
            const ageLabels = Object.keys(categories);
            const positiveVotes = ageLabels.map(category => categories[category].肯定);
            const negativeVotes = ageLabels.map(category => categories[category].否定);

            if (myChart) myChart.destroy();

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    datasets: [{
                        label: location + ' - 肯定',
                        data: positiveVotes,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    }, {
                        label: location + ' - 否定',
                        data: negativeVotes.map(vote => -vote), // 否定票は逆方向
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                    }]
                },
                options: {
                    indexAxis: 'y', // 横棒グラフにする
                    scales: {
                        x: {
                            beginAtZero: true,
                        },
                        y: {
                            title: {
                                display: true,
                                text: '年齢カテゴリ'
                            },
                            reverse: true // Y軸を反転させて若い順にする
                        }
                    }
                }
            });

            document.getElementById('myChart').style.display = 'block'; // グラフを表示
        }



    </script>



     <!-- <div id="chat-box">
        <h3>チャット</h3>
        <div id="chat-messages">
            // チャットメッセージがここに表示される 
        </div>

        <form id="chat-form">
            <input type="text" id="username" placeholder="名前" required>
            <textarea id="message" placeholder="メッセージ" required></textarea>
            <select id="location" required>
                <option value="" disabled selected>居住地を選択</option>
                // 居住地の選択肢を追加 
                <option value="東京">東京</option>
                <option value="大阪">大阪</option>
                // 他の選択肢も追加 
            </select>
            <select id="gender" required>
                <option value="" disabled selected>性別を選択</option>
                <option value="male">男性</option>
                <option value="female">女性</option>
            </select>
            <select id="age_category" required>
                <option value="" disabled selected>年齢カテゴリを選択</option>
                <option value="10代">10代</option>
                <option value="20代">20代</option>
                // 他の年齢カテゴリも追加 
            </select>
            <button type="submit">送信</button>
        </form>
    </div>

    <script>
        const newsId = {{ $news_id }};
        
        // チャットメッセージの送信処理
        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const username = document.getElementById('username').value;
            const message = document.getElementById('message').value;
            const location = document.getElementById('location').value;
            const gender = document.getElementById('gender').value;
            const ageCategory = document.getElementById('age_category').value;

            fetch(`/news/${newsId}/chat`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    username: username,
                    message: message,
                    location: location,
                    gender: gender,
                    age_category: ageCategory,
                })
            }).then(response => response.json())
            .then(data => {
                if (data.message === 'Chat saved successfully') {
                    loadChatMessages();
                    document.getElementById('chat-form').reset();
                }
            });
        });

        // チャットメッセージの読み込み処理
        function loadChatMessages() {
            fetch(`/news/${newsId}/chat`)
                .then(response => response.json())
                .then(data => {
                    const chatMessages = document.getElementById('chat-messages');
                    chatMessages.innerHTML = '';

                    data.forEach(chat => {
                        chatMessages.innerHTML += `
                            <p><strong>${chat.username}</strong> (${chat.age_category}, ${chat.gender}, ${chat.location}): ${chat.message}</p>
                        `;
                    });
                });
        }

        // ページ読み込み時にチャットメッセージを取得
        window.onload = loadChatMessages;


        fetch('http://localhost/news/1/chat')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // レスポンスをJSONとしてパース
            })
            .then(data => {
                console.log(data); // チャットメッセージをコンソールに表示
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    </script>  -->


    <a href="{{ url('/news') }}">戻る</a>
</body>
</html>
