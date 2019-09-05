ARG ALPINE=3.10

FROM alpine:${ALPINE} as builder
ARG BUILD_PATH=/opt/mydumper/
ARG MYDUMPER=0.9.5

RUN apk --no-cache add build-base cmake git glib-dev mariadb-dev zlib-dev pcre-dev libressl-dev \
    && git clone https://github.com/maxbube/mydumper.git ${BUILD_PATH} \
    && cd ${BUILD_PATH} \
    && git checkout v${MYDUMPER} \
    && cmake . \
    && make -j \
    && make install

FROM alpine:${ALPINE}

RUN addgroup -S -g 942 mydumper && adduser -S -G mydumper -u 942 mydumper \
    && apk add --no-cache su-exec mariadb-client mariadb-dev glib
COPY --from=builder /usr/local/bin/mydumper /usr/local/bin/
COPY --from=builder /usr/local/bin/myloader /usr/local/bin/

RUN mkdir /backup && chown mydumper:mydumper /backup
VOLUME /backup
WORKDIR /backup

COPY docker-entrypoint.sh /usr/local/bin/
ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["mydumper", "--help"]
