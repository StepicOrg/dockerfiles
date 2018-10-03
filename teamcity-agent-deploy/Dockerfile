FROM stepik/teamcity-agent-base:2018.1.2
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV ANSIBLE_VERSION 2.6.5

RUN apt-get update && apt-get install --no-install-recommends -y \
    python2.7 python2.7-dev python-setuptools python-pip gcc openssh-client wget \
 && rm -rf /var/lib/apt/lists/*

RUN pip install --no-cache-dir ansible==$ANSIBLE_VERSION

RUN mkdir -p /opt/ansible/roles && chown -R $USER:$USER /opt/ansible
COPY ansible.cfg $HOME/.ansible.cfg
