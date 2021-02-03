import dayjs from 'dayjs'
class Timer {
    record(name) {
        window.localStorage.setItem(name, dayjs())
    }
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
