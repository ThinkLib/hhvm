<?php
/**
 * Automatically generated by running "php schema.php curl".
 *
 * You may modify the file, but re-running schema.php against this file will
 * standardize the format without losing your schema changes. It does lose
 * any changes that are not part of schema. Use "note" field to comment on
 * schema itself, and "note" fields are not used in any code generation but
 * only staying within this file.
 */
///////////////////////////////////////////////////////////////////////////////
// Preamble: C++ code inserted at beginning of ext_{name}.h

DefinePreamble(<<<CPP
#include <curl/curl.h>
#include <curl/easy.h>
#include <curl/multi.h>
CPP
);

///////////////////////////////////////////////////////////////////////////////
// Constants
//
// array (
//   'name' => name of the constant
//   'type' => type of the constant
//   'note' => additional note about this constant's schema
// )


///////////////////////////////////////////////////////////////////////////////
// Functions
//
// array (
//   'name'   => name of the function
//   'desc'   => description of the function's purpose
//   'flags'  => attributes of the function, see base.php for possible values
//   'opt'    => optimization callback function's name for compiler
//   'note'   => additional note about this function's schema
//   'return' =>
//      array (
//        'type'  => return type, use Reference for ref return
//        'desc'  => description of the return value
//      )
//   'args'   => arguments
//      array (
//        'name'  => name of the argument
//        'type'  => type of the argument, use Reference for output parameter
//        'value' => default value of the argument
//        'desc'  => description of the argument
//      )
// )

DefineFunction(
  array(
    'name'   => "curl_init",
    'desc'   => "Initializes a new session and return a cURL handle for use with the curl_setopt(), curl_exec(), and curl_close() functions.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "Returns a cURL handle on success, FALSE on errors.",
    ),
    'args'   => array(
      array(
        'name'   => "url",
        'type'   => String,
        'value'  => "null_string",
        'desc'   => "If provided, the CURLOPT_URL option will be set to its value. You can manually set this using the curl_setopt() function.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_copy_handle",
    'desc'   => "Copies a cURL handle keeping the same preferences.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "Returns a new cURL handle.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_version",
    'desc'   => "Returns information about the cURL version.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "Returns an associative array with the following elements: Indice Value description version_number cURL 24 bit version number version cURL version number, as a string ssl_version_number OpenSSL 24 bit version number ssl_version OpenSSL version number, as a string libz_version zlib version number, as a string host Information about the host where cURL was built age   features A bitmask of the CURL_VERSION_XXX constants protocols An array of protocols names supported by cURL",
    ),
    'args'   => array(
      array(
        'name'   => "uversion",
        'type'   => Int32,
        'value'  => "k_CURLVERSION_NOW",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_setopt",
    'desc'   => "Sets an option on the given cURL session handle.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "Returns TRUE on success or FALSE on failure.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
      ),
      array(
        'name'   => "option",
        'type'   => Int32,
      ),
      array(
        'name'   => "value",
        'type'   => Variant,
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_setopt_array",
    'desc'   => "Sets multiple options for a cURL session. This function is useful for setting a large amount of cURL options without repetitively calling curl_setopt().",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Boolean,
      'desc'   => "Returns TRUE if all options were successfully set. If an option could not be successfully set, FALSE is immediately returned, ignoring any future options in the options array.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
      array(
        'name'   => "options",
        'type'   => VariantVec,
        'desc'   => "An array specifying which options to set and their values. The keys should be valid curl_setopt() constants or their integer equivalents.",
      ),
    ),
  ));

// FB-specific extension
DefineFunction(
  array(
    'name'   => "fb_curl_getopt",
    'desc'   => "Gets options on the given cURL session handle.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "If opt is given, returns its value. Otherwise, returns an associative array.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
      array(
        'name'   => "opt",
        'type'   => Int32,
        'value'  => "0",
        'desc'   => "This should be one of the CURLOPT_* values.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_exec",
    'desc'   => "Execute the given cURL session.\n\nThis function should be called after initializing a cURL session and all the options for the session are set.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "Returns TRUE on success or FALSE on failure. However, if the CURLOPT_RETURNTRANSFER option is set, it will return the result on success, FALSE on failure.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_getinfo",
    'desc'   => "Gets information about the last transfer.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "If opt is given, returns its value as a string. Otherwise, returns an associative array with the following elements (which correspond to opt): \"url\" \"content_type\" \"http_code\" \"header_size\" \"request_size\" \"filetime\" \"ssl_verify_result\" \"redirect_count\" \"total_time\" \"namelookup_time\" \"connect_time\" \"pretransfer_time\" \"size_upload\" \"size_download\" \"speed_download\" \"speed_upload\" \"download_content_length\" \"upload_content_length\" \"starttransfer_time\" \"redirect_time\"",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
      array(
        'name'   => "opt",
        'type'   => Int32,
        'value'  => "0",
        'desc'   => "This may be one of the following constants: CURLINFO_EFFECTIVE_URL - Last effective URL CURLINFO_HTTP_CODE - Last received HTTP code CURLINFO_FILETIME - Remote time of the retrieved document, if -1 is returned the time of the document is unknown CURLINFO_TOTAL_TIME - Total transaction time in seconds for last transfer CURLINFO_NAMELOOKUP_TIME - Time in seconds until name resolving was complete CURLINFO_CONNECT_TIME - Time in seconds it took to establish the connection CURLINFO_PRETRANSFER_TIME - Time in seconds from start until just before file transfer begins CURLINFO_STARTTRANSFER_TIME - Time in seconds until the first byte is about to be transferred CURLINFO_REDIRECT_TIME - Time in seconds of all redirection steps before final transaction was started CURLINFO_SIZE_UPLOAD - Total number of bytes uploaded CURLINFO_SIZE_DOWNLOAD - Total number of bytes downloaded CURLINFO_SPEED_DOWNLOAD - Average download speed CURLINFO_SPEED_UPLOAD - Average upload speed CURLINFO_HEADER_SIZE - Total size of all headers received CURLINFO_HEADER_OUT - The request string sent CURLINFO_REQUEST_SIZE - Total size of issued requests, currently only for HTTP requests CURLINFO_SSL_VERIFYRESULT - Result of SSL certification verification requested by setting CURLOPT_SSL_VERIFYPEER CURLINFO_CONTENT_LENGTH_DOWNLOAD - content-length of download, read from Content-Length: field CURLINFO_CONTENT_LENGTH_UPLOAD - Specified size of upload CURLINFO_CONTENT_TYPE - Content-Type: of downloaded object, NULL indicates server did not send valid Content-Type: header",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_errno",
    'desc'   => "Returns the error number for the last cURL operation.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "Returns the error number or 0 (zero) if no error occurred.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_error",
    'desc'   => "Returns a clear text error message for the last cURL operation.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "Returns the error message or '' (the empty string) if no error occurred.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_close",
    'desc'   => "Closes a cURL session and frees all resources. The cURL handle, ch, is also deleted.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "No value is returned.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_multi_init",
    'desc'   => "Allows the processing of multiple cURL handles in parallel.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Resource,
      'desc'   => "Returns a cURL multi handle resource on success, FALSE on failure.",
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_multi_add_handle",
    'desc'   => "Adds the ch handle to the multi handle mh",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "Returns 0 on success, or one of the CURLM_XXX errors code.",
    ),
    'args'   => array(
      array(
        'name'   => "mh",
        'type'   => Resource,
        'desc'   => "A cURL multi handle returned by curl_multi_init().",
      ),
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_multi_remove_handle",
    'desc'   => "Removes a given ch handle from the given mh handle. When the ch handle has been removed, it is again perfectly legal to run curl_exec() on this handle. Removing a handle while being used, will effectively halt all transfers in progress.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "On success, returns a cURL handle, FALSE on failure.",
    ),
    'args'   => array(
      array(
        'name'   => "mh",
        'type'   => Resource,
        'desc'   => "A cURL multi handle returned by curl_multi_init().",
      ),
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_multi_exec",
    'desc'   => "Processes each of the handles in the stack. This method can be called whether or not a handle needs to read or write data.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "A cURL code defined in the cURL Predefined Constants.\n\nThis only returns errors regarding the whole multi stack. There might still have occurred problems on individual transfers even when this function returns CURLM_OK.",
    ),
    'args'   => array(
      array(
        'name'   => "mh",
        'type'   => Resource,
        'desc'   => "A cURL multi handle returned by curl_multi_init().",
      ),
      array(
        'name'   => "still_running",
        'type'   => Variant | Reference,
        'desc'   => "A reference to a flag to tell whether the operations are still running.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_multi_select",
    'desc'   => "Blocks until there is activity on any of the curl_multi connections.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "On success, returns the number of descriptors contained in, the descriptor sets. On failure, this function will return -1 on a select failure or timeout (from the underlying select system call).",
    ),
    'args'   => array(
      array(
        'name'   => "mh",
        'type'   => Resource,
        'desc'   => "A cURL multi handle returned by curl_multi_init().",
      ),
      array(
        'name'   => "timeout",
        'type'   => Double,
        'value'  => "1.0",
        'desc'   => "Time, in seconds, to wait for a response.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_multi_getcontent",
    'desc'   => "If CURLOPT_RETURNTRANSFER is an option that is set for a specific handle, then this function will return the content of that cURL handle in the form of a string.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "Return the content of a cURL handle if CURLOPT_RETURNTRANSFER is set.",
    ),
    'args'   => array(
      array(
        'name'   => "ch",
        'type'   => Resource,
        'desc'   => "A cURL handle returned by curl_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_multi_info_read",
    'desc'   => "Ask the multi handle if there are any messages or information from the individual transfers. Messages may include information such as an error code from the transfer or just the fact that a transfer is completed.\n\nRepeated calls to this function will return a new result each time, until a FALSE is returned as a signal that there is no more to get at this point. The integer pointed to with msgs_in_queue will contain the number of remaining messages after this function was called. Warning\n\nThe data the returned resource points to will not survive calling curl_multi_remove_handle().",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "On success, returns an associative array for the message, FALSE on failure.\n\nContents of the returned array Key: Value: msg The CURLMSG_DONE constant. Other return values are currently not available. result One of the CURLE_* constants. If everything is OK, the CURLE_OK will be the result. handle Resource of type curl indicates the handle which it concerns.",
    ),
    'args'   => array(
      array(
        'name'   => "mh",
        'type'   => Resource,
        'desc'   => "A cURL multi handle returned by curl_multi_init().",
      ),
      array(
        'name'   => "msgs_in_queue",
        'type'   => Variant | Reference,
        'value'  => "null",
        'desc'   => "Number of messages that are still in the queue",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "curl_multi_close",
    'desc'   => "Closes a set of cURL handles.",
    'flags'  =>  HasDocComment,
    'return' => array(
      'type'   => Variant,
      'desc'   => "No value is returned.",
    ),
    'args'   => array(
      array(
        'name'   => "mh",
        'type'   => Resource,
        'desc'   => "A cURL multi handle returned by curl_multi_init().",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "evhttp_set_cache",
    'desc'   => "Specifies how many persistent connections to maintain for an HTTP server.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => null,
    ),
    'args'   => array(
      array(
        'name'   => "address",
        'type'   => String,
        'desc'   => "Domain name for an HTTP server. Connections to this server, regardless of what server objects to fetch (specified by a URL), will be cached as persistent connections for re-use.",
      ),
      array(
        'name'   => "max_conn",
        'type'   => Int32,
        'desc'   => "Maximum number of connections to keep.",
      ),
      array(
        'name'   => "port",
        'type'   => Int32,
        'value'  => "80",
        'desc'   => "Port number of the HTTP server.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "evhttp_get",
    'desc'   => "Synchronously HTTP GET a URL with libevent evhttp library.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Variant,
      'desc'   => "HTTP response. FALSE if any failure.",
    ),
    'args'   => array(
      array(
        'name'   => "url",
        'type'   => String,
        'desc'   => "The URL to fetch.",
      ),
      array(
        'name'   => "headers",
        'type'   => StringVec,
        'value'  => "null_array",
        'desc'   => "HTTP headers.",
      ),
      array(
        'name'   => "timeout",
        'type'   => Int32,
        'value'  => "5",
        'desc'   => "How many seconds to wait for response.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "evhttp_post",
    'desc'   => "Synchronously HTTP POST a URL with libevent evhttp library.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Variant,
      'desc'   => "HTTP response. FALSE if any failure.",
    ),
    'args'   => array(
      array(
        'name'   => "url",
        'type'   => String,
        'desc'   => "The URL to post to.",
      ),
      array(
        'name'   => "data",
        'type'   => String,
        'desc'   => "POST data.",
      ),
      array(
        'name'   => "headers",
        'type'   => StringVec,
        'value'  => "null_array",
        'desc'   => "HTTP headers.",
      ),
      array(
        'name'   => "timeout",
        'type'   => Int32,
        'value'  => "5",
        'desc'   => "How many seconds to wait for response.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "evhttp_async_get",
    'desc'   => "Asynchronously HTTP GET a URL with libevent evhttp library. This is a non-blocking call, without waiting for HTTP server to respond.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Variant,
      'desc'   => "An object evhttp_recv() can use to eventually retrieve HTTP response. FALSE if there was any failure.",
    ),
    'args'   => array(
      array(
        'name'   => "url",
        'type'   => String,
        'desc'   => "The URL to fetch.",
      ),
      array(
        'name'   => "headers",
        'type'   => StringVec,
        'value'  => "null_array",
        'desc'   => "HTTP headers.",
      ),
      array(
        'name'   => "timeout",
        'type'   => Int32,
        'value'  => "5",
        'desc'   => "How many seconds to wait for response.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "evhttp_async_post",
    'desc'   => "Asynchronously HTTP POST a URL with libevent evhttp library. This is a non-blocking call, without waiting for HTTP server to respond.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Variant,
      'desc'   => "An object evhttp_recv() can use to eventually retrieve HTTP response. FALSE if there was any failure.",
    ),
    'args'   => array(
      array(
        'name'   => "url",
        'type'   => String,
        'desc'   => "The URL to post to.",
      ),
      array(
        'name'   => "data",
        'type'   => String,
        'desc'   => "POST data.",
      ),
      array(
        'name'   => "headers",
        'type'   => StringVec,
        'value'  => "null_array",
        'desc'   => "HTTP headers.",
      ),
      array(
        'name'   => "timeout",
        'type'   => Int32,
        'value'  => "5",
        'desc'   => "How many seconds to wait for response.",
      ),
    ),
  ));

DefineFunction(
  array(
    'name'   => "evhttp_recv",
    'desc'   => "Block and wait until HTTP response is ready.",
    'flags'  =>  HasDocComment | HipHopSpecific,
    'return' => array(
      'type'   => Variant,
      'desc'   => "HTTP response. FALSE if any failure.",
    ),
    'args'   => array(
      array(
        'name'   => "handle",
        'type'   => Object,
        'desc'   => "The object created by calling evhttp_async_get() or evhttp_async_post().",
      ),
    ),
  ));


DefineConstant(
  array(
    'name'   => "CURLINFO_LOCAL_PORT",
    'type'   => Int64,
  ));

DefineConstant(
  array(
    'name'   => "CURLOPT_TIMEOUT_MS",
    'type'   => Int64,
  ));

DefineConstant(
  array(
    'name'   => "CURLOPT_CONNECTTIMEOUT_MS",
    'type'   => Int64,
  ));


///////////////////////////////////////////////////////////////////////////////
// Classes
//
// BeginClass
// array (
//   'name'   => name of the class
//   'desc'   => description of the class's purpose
//   'flags'  => attributes of the class, see base.php for possible values
//   'note'   => additional note about this class's schema
//   'parent' => parent class name, if any
//   'ifaces' => array of interfaces tihs class implements
//   'bases'  => extra internal and special base classes this class requires
//   'footer' => extra C++ inserted at end of class declaration
// )
//
// DefineConstant(..)
// DefineConstant(..)
// ...
// DefineFunction(..)
// DefineFunction(..)
// ...
// DefineProperty
// DefineProperty
//
// array (
//   'name'  => name of the property
//   'type'  => type of the property
//   'flags' => attributes of the property
//   'desc'  => description of the property
//   'note'  => additional note about this property's schema
// )
//
// EndClass()

