export default {
    convertAllDigitsToPersian: function (str) {
        const digit_dict = {
            "0": "۰",
            "1": "۱",
            "2": "۲",
            "3": "۳",
            "4": "۴",
            "5": "۵",
            "6": "۶",
            "7": "۷",
            "8": "۸",
            "9": "۹",
        };

        var regx = new RegExp(Object.keys(digit_dict).join("|"), "gi");
        return str.replace(regx, function (matched) {
            return digit_dict[matched];
        });
    }
}