#!/bin/sh
set -e

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
  set -- mydumper "$@"
fi

# allow the container to be started with `--user`
if { [ "$1" = 'mydumper' ] || [ "$1" = 'myloader' ]; } && [ "$(id -u)" = '0' ]; then
  exec su-exec mydumper "$0" "$@"
fi

exec "$@"
