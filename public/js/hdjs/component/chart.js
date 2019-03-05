//图表
define(['package/Chart.bundle.min','lodash'], function (Chart,_) {
    return function (el, opt) {
        let options = _.assign({}, opt);
        return new Chart($(el), options);
    }
});