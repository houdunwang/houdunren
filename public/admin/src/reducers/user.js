import types from "../actions/types";
//初始值
const initState = {};

export default function user(state = initState, action) {
    switch (action.type) {
        case types.USER_ADD:
            return "用户添加";
        case types.USER_UPDATE:
            return "用户更新";
        case types.USER_LOGIN:
            return state;
        case types.USER_REGISTER:
            return state;
        case types.USER_LOGOUT:
            return {};
        default:
            return state;
    }
}
