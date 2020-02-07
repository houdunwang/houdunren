import types from "./types";
export const login = user => ({
    type: types.LOGIN,
    data: user
});
