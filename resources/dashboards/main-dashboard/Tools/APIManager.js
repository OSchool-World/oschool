import axios from "axios";

var server_url = "http://oschool.local/api";

export default {
    get: function (url) {
        return new Promise((resolve, reject) => {
            return axios.get(server_url + url)
                .then(response => {
                    response(response);
                })
                .catch(error => {
                    reject(error);
                })
        });
    },
    post: function () {

    }
}
