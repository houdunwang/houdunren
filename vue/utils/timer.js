import dayjs from 'dayjs'
class Timer {
    //记录时间
    record(name) {
        window.localStorage.setItem(name, dayjs())
    }
    //取时间差
    diffNow(name, timeout = 60) {
        const time = window.localStorage.getItem(name)
        return Math.round(
            dayjs(time)
                .add(timeout, 'seconds')
                .diff(dayjs(), 'second')
        )
    }
}

export default new Timer()
