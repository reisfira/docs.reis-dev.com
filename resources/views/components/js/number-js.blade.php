// used in calculation to parse "100,000.00 | 0.00 | 0 | 1 | undefined => 0"
let parsingDecimal = function (item) {
    if (item === undefined)
        return 0

    // parse to number with two decimal place and sanitize commas
    if (typeof item === "string" && item.includes(','))
        item = item.replace(new RegExp("\\,", 'g'), '')

    return parseFloat(Number(item || 0).toFixed(3))
}

let parsingInteger = function (item) {
    return parseInt(parsingDecimal(item))
}

let displayNumber = function (item, decimal_places = 2) {
    return item.toFixed(decimal_places)
}
