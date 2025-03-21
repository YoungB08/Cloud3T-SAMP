#if defined _cloud3tc_included
    #endinput
#endif
#define _cloud3tc_included

#tryinclude <a_http>
#if !defined _INC_a_http
    #error "You must include 'a_http.inc' before using!"
#endif

#define CLOUD3T_API_MUCSIC "localhost/backend/youtube/music"
#define CLOUD3T_API_SEARCH "localhost/backend/youtube/search"

#define Cloud3T_Response:%0(%1) \
forward MR_ % 0( % 1);
\
public MR_ % 0( % 1)
#include <json>
// #define Cloud3T: #
stock ReplaceString(const rstring[], const rkey[], const r_replace[])
{
    for (new i; i < strlen(rstring); i++)
    {
        if (rstring[i] == rkey)
        {
            rstring[i] = r_replace;
        }
    }
    return rstring;
}
stock YouTubeMusic_Search(playerid, const api_key[], const search[], limit_result)
{
    new url[256];
    format(url, sizeof(url), "%s?key=%s&search=%s&limit=%d", CLOUD3T_API_SEARCH, api_key, search, limit_result);
    HTTP(playerid, HTTP_GET, url, "", "Cloud3T_Search");
    return 1;
}


Cloud3T_Response:Cloud3T_Search(index, response_code, const data[])
{
    new Node:response;
    new ret;
    ret = JSON_Parse(data, response);

    new status;
    JSON_GetInt(jsonNode, "status", status);
    JSON_GetString(jsonNode, "msg", msg, sizeof(msg));
    new apikey[64], sign[64], query[64], msg[64];
    if (status == 1)
    {
        JSON_GetString(jsonNode, "apikey", apikey, sizeof(apikey));
        JSON_GetString(jsonNode, "sign", sign, sizeof(sign));
        JSON_GetString(jsonNode, "query", query, sizeof(query));

        new Node:dataArray;
        if (JSON_GetArray(jsonNode, "data", dataArray))
        {
            new size = JSON_ArraySize(dataArray);
            for (new i = 0; i < size; i++)
            {
                new Node:item;
                JSON_ArrayGetNode(dataArray, i, item);

                new title[128], channel[64], link[256];
                JSON_GetString(item, "Title", title, sizeof(title));
                JSON_GetString(item, "Channel", channel, sizeof(channel));
                JSON_GetString(item, "Link", link, sizeof(link));

                printf("Video %d: %s by %s", i + 1, title, channel);
                printf("Link: %s", link);

                JSON_Cleanup(item);
            }
            JSON_Cleanup(dataArray);
        }

    }
}