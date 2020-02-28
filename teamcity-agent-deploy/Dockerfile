FROM stepik/teamcity-agent-base:2019.1.1
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV ANSIBLE_VERSION 2.9.5
ENV OPENSHIFT_VERSION 0.10.2

RUN apt-get update && apt-get install --no-install-recommends -y \
    python3 python3-dev python3-setuptools python3-pip gcc openssh-client wget \
 && rm -rf /var/lib/apt/lists/*

RUN pip3 install --no-cache-dir ansible==$ANSIBLE_VERSION openshift==$OPENSHIFT_VERSION

RUN mkdir -p /opt/ansible/roles && chown -R $USER:$USER /opt/ansible
COPY ansible.cfg $HOME/.ansible.cfg
