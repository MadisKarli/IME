console.log('offline!');
var online = navigator.onLine;
localStorage["connection"] = "Online:"+online;
console.log('Ühendus olemas:'+online);
var db = openDatabase("notes", "", "The Example Notes App!", 1048576);
document.getElementById('raam2').innerHTML ='Tere pere!';
if(online){
    document.getElementById('raam2').innerHTML =
        'Tere pere!';
}
function renderNote(row) {
    localStorage["väärtus"] = row;
}
function reportError(source, message) {
  // report error
}

function renderNotes() {
    db.transaction(function (tx) {
        tx.executeSql('CREATE TABLE IF NOT EXISTS Notes(title TEXT, body TEXT)', []);
        var yks = 'pere';
        tx.executeSql('INSERT INTO Notes VALUES(yks,yks)');
        tx.executeSql('SELECT * FROM Notes', [], function (tx, rs) {
            for (var i = 0; i < rs.rows.length; i++) {
                renderNote(rs.rows[i]);
            }
        });
    });
}

function insertNote(title, text) {
  db.transaction(function(tx) {
    tx.executeSql('INSERT INTO Notes VALUES(?, ?)', [ title, text ],
      function(tx, rs) {
        // …
      },
      function(tx, error) {
        reportError('sql', error.message);
      });
  });
}
var DataBaseManager = {
    Offlinedb: openDatabase("OfflineDB", '1', 'my first database', 2 * 1024 * 1024),
    initializeDataBase: function () {
        var self = this;
        self.Offlinedb.transaction(function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS UserData (UserID INTEGER PRIMARY KEY AUTOINCREMENT, Name, Email, Technology)');
        });
    },
    AddnewUser: function (data, callback) {//data: contains the object of user ,
        // callback: is a function will execute after the addition

        this.initializeDataBase();
        var self = this;
        self.Offlinedb.transaction(function (tx) {
            var query = "insert into UserData(Name,Email,Technology) values(?,?,?)";
            var nimi = 'lol';
            var meil = 'ddd';
            var tech = 'dds';
            tx.executeSql(query, [nimi, meil, tech],
            function (tx, results) {
                if (callback) callback("User Saved");
            });
        });
    }
}