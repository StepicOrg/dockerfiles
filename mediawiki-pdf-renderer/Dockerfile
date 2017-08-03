FROM debian:8

RUN apt-get update && apt-get install -y \
    g++ \
    perl \
    python \
    python-dev \
    python-setuptools \
    python-imaging \
    python-lxml \
    libevent-dev \
    openssl \
    ca-certificates \
    pdftk \
    imagemagick

RUN easy_install pip

RUN pip install \
    gevent==1.1.2 \
    mwlib==0.15.14 \
    mwlib.rl==0.14.5

EXPOSE 8899

CMD ["/bin/bash", "-c", "nserve & nslave --cachedir ~/cache/ & postman & mw-qserve"]
