from flask import Flask, jsonify, request

app = Flask(__name__)

# A sample route
@app.route('/')
def home():
    data = [
            {"seq": 1,   "first": "Gertrude",   "email": "leb@ganti.ie" },
            {"seq": 2,   "first": "Antonio",   "email": "abohogos@cub.ca" },
            {"seq": 3,   "first": "Fred",   "email": "pup@jaige.pe" },
            {"seq": 4,   "first": "Gussie",   "email": "afpece@wi.bq" },
            {"seq": 5,   "first": "Louis",   "email": "po@itovudo.mw" },
            {"seq": 6,   "first": "Brent",   "email": "toztaned@heb.bb" },
            {"seq": 7,   "first": "Phillip",   "email": "mipzeh@pus.kg" },
            {"seq": 8,   "first": "Maud",   "email": "rosova@do.jo" },
            {"seq": 9,   "first": "Leila",   "email": "obtifor@saceduf.sa" },
            {"seq": 10,   "first": "Arthur",   "email": "bimte@feteho.ne" },
            {"seq": 11,   "first": "Lulu",   "email": "ta@nafuwavob.tn" },
            {"seq": 12,   "first": "Joe",   "email": "rocalasu@acedorac.kg" },
            {"seq": 13,   "first": "Rose",   "email": "furelmaw@jom.aw" },
            {"seq": 14,   "first": "Roy",   "email": "tihli@zab.bj" },
            {"seq": 15,   "first": "Jon",   "email": "wabsathe@mesi.is" }
        ]
    
    # with open('user.json', 'r') as file:
    #     data = json.load(file)
    return jsonify(data)

# An example of a POST route
@app.route('/api/data', methods=['POST'])
def process_data():
    data = request.get_json()
    return jsonify({"received_data": data})

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)